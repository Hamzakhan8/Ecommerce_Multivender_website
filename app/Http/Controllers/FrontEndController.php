<?php

namespace App\Http\Controllers;

use App\Hall;

use App\Like;
use App\User;
use App\Order;
use App\Coupon;
use App\Comment;
use App\Product;
use App\Category;
use Stripe\Charge;
use Stripe\Stripe;
use App\Subcategory;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontEndController extends Controller
{
    public function CategoryProducts($name)
    {
    	$categorytype = Category::where('name', $name)->first();
    	//here we are fetching row from category the where name = $name
    	$products = $categorytype->products;
    	//here we are using many to one relation one category has many products
        return view('front-end.categoryWise-products.categoryWise-products',compact('categorytype','products'));
    }
    public function allproducts(){
        $product = Product::all()->paginate(4);
        return view('front-end.all-product.all-product-details', compact('product'));
    }

    public function ProductDetails($name)
    {
    	$product = Product::where('title', $name)->first();
    	return view('front-end.single-product.single-product-details', compact('product'));
    }

    public function PostComment(Request $request)
    {
        $art = new Comment();
        $art->user_id = auth()->user()->id;
        $art->product_id = $request->product_id;
        $art->comment = $request->comment;
        $art->save();

        return back();//redirect back to the page it work as a page refresher
    }

    public function SearchProduct(Request $request)
    {

        Session::put('searchedcity' , $request->search);
        $products = Product::where('title','LIKE','%'.$request->search.'%')->get();
        if (count($products) != 0)
        {
            // print($products);dd();
            $category = Category::all();
            return view ('front-end.search.search-products', compact('products','category'));
        }
    	elseif($category = Category::where('name','LIKE','%'.$request->search.'%')->first())
        {
            $products = $category->products;
            $category = Category::all();
            return view ('front-end.search.search-products', compact('products','category'));
        }
        elseif($products = Product::where('city', 'like', '%'.$request->search.'%')->get()){
                $category = Category::all();
        return view ('front-end.search.search-products', compact('products','category'));
        }else{
            $products = null;
        return view ('front-end.search.search-products', compact('products','category'));
        }

    }

    public function AddCartItem(Request $request)
    {
        Cart::add($request->product_id, $request->title, $request->qty, $request->price,
        ['size'=>$request->size,'seller_id'=>$request->seller_id,'delivery_charges'=>$request->delivery_charges,'extras'=>$request->extras,'image_path'=> $request->image_path, 'title' => $request->title]);
        $totalPrice = Cart::subtotal();
        Session::put('totalPrice', $totalPrice);

        Session::put('extras',$request->extras);
        return back()->with('success', 'Added To Cart Successfully');
    }

    public function CartDetails()
    {
        // $products=Product::all();
        return view('front-end.cart-details.add-to-cart');
    }
    public function CartUpdate(Request $request , $id)
    {
        $cart = Cart::update($id, $request->qty);
        $totalPrice = Cart::subtotal();
        Session::put('totalPrice',$totalPrice);
        Session::put('extras',$request->extras);

        return back();
    }
    public function ApplyCoupon(Request $request)
    {

        $coupon = Coupon::where('code', $request->coupon)->where('from_date', '<=', \Carbon\Carbon::now()->toDateString())->where('to_date', '>=', \Carbon\Carbon::now()->toDateString())->first();
        if (empty($coupon)) {
            return back()->with("warning", "Coupon Code Doesn't Exist");
        }
        else
        {
            $a = Cart::subtotal();
            $a = intval($a);
            $b = $coupon->price;
            $couponPrice = $a - $b;
            Session::put('couponPrice', $couponPrice);

            return view('front-end.cart-details.add-to-cart', compact('couponPrice'))
            ->with("success", "Coupon Code Applied Successfully");
        }
    }

    public function Checkout($price)
    {
        $value = 100;
        Session::put('shipping_price', $value);

        $a = Cart::subtotal();
        $a = (double)$a;
        $b = Session::get('shipping_price');

        if (empty($price) || $price == null) {

            $totalPrice = $a + $b;
            Session::put('totalPrice', $totalPrice);
        }else {
            $couponPrice = $price;
            Session::put('couponPrice', $couponPrice);
        }

        return view('front-end.cart-confirmation.confirmation');
    }

    public function PlaceOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required'
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET_KEY', 'sk_test_51K3NIIAcehZZuafTMTklTzp2xhUUybuUhqqE0C9OOxN3POXNmfHIAwYC8Y2jfZK4bZAwKX8i71qhwEyPa39nXQJZ00SS2ddkFh'));
        // u can do same as create([]) or create(array()) both are array
        $customer = Customer::create(array(
            'email' => $request->stripeEmail,
            'source'=> $request->stripeToken,
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            // this customer id is taken from the above $customer created
            'amount' => $request->amount,
            'currency' => 'usd',
        ));



        foreach (Cart::content() as $cart) {

            Order::create([
                'buyer_id' => auth()->user()->id,
                'seller_id' => $cart->options->seller_id,
                'delivery_charges' => Session::get('shipping_price'),
                'extras' => $cart->options->extras,
                'product_id' => $cart->id,
                'quantity' => $cart->qty,
                'total_price' => $cart->qty * $cart->price,
                'shipping_address' => $request->shipping_address,
                'status' => '0',
                'type' => 'Online Payment and Delivery',

            ]);
            Cart::destroy();
            Session::put('totalPrice', 0);

        }
        return redirect()->route('cart.list')->with('success', 'Ur Order Has Been Placed Successfully');
    }

    public function selfOrder(Request $request)
    {
        foreach (Cart::content() as $cart) {

            Order::create([
                'buyer_id' => auth()->user()->id,
                'seller_id' => $cart->options->seller_id,
                'extras' => $cart->options->extras,
                'product_id' => $cart->id,
                'quantity' => $cart->qty,
                'total_price' => $cart->qty * $cart->price,
                'shipping_address' => $request->shipping_address,
                'status' => '0',
                'type' => 'Self Receive',
                'delivery_charges' => '0',

            ]);
            Cart::destroy();
            Session::put('totalPrice', 0);

        }
        return redirect()->route('cart.list')->with('success', 'Ur Order Has Been Placed Successfully');
    }



    public function ProductLike(Product $product)
    {
        if ( auth()->check()) {
    $checkIfAlredyLiked = Like::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
            if (empty($checkIfAlredyLiked)) {
                Like::create([
                    'user_id' => auth()->user()->id,
                    'product_id'  => $product->id,
                ]);
                return '1';//return 1 to tell them that u have like the product
            }//second if
            else{
                return '2';
            }//if checkifalready has data thn if will fail and this will be send . inner loop else if it fails else will return 2 to tell that u have already liked it

        }//first if
        else
        {
            return '3';
        }//first if , if f fails else will return 3 and tell user to login
    }

    public function viewAllGifts()
    {
        $products = Product::get();
        return view('front-end.categoryWise-products.categoryWise-products',compact('products'));
    }

    public function contactUs()
    {
        return view('front-end.contact.contact');
    }

    public function allShop()
    {

        $user = User::where('role',2)->get();
        return view('front-end.shop.allShops',compact('user'));
    }

    public function shopGifts($id)
    {
        $products = Product::where('user_id',$id)->get();
        return view ('front-end.categoryWise-products.categoryWise-products', compact('products'));
    }

    public function index()
    {
        $category = Category::all();
        $products = Product::Paginate(5);
        $user = User::where('role',2)->get();
        return view('front-end.index.index',compact('user','products','category'));
    }

    /**
     * Show the login page
     * @return View
     */
    public function showLogin() {

        return view('front-end.login.login');
    }

    /**
     * Show the Register page
     * @return View
     */
    public function showRegister() {

        return view('front-end.register.register');
    }

    public function shopProducts($id)
    {
        $user = User::where('id',$id)->first();
        $products = Product::where('user_id',$id)->get();
        return view ('front-end.shop.shop-products', compact('products','user'));
    }



    function fetch(Request $request)
    {
     if($request->ajax())
     {
      $products = Product::Paginate(5);
         return view('pagination_child', compact('products'))->render();
     }
    }

    public function allOcassions()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('front-end.ocassions.all-ocassions',compact('category','subcategory'));
    }

    public function hallList()
    {
        $hall = Hall::all();
        return view('front-end.hall-booking.hall-list',compact('hall'));
    }
    public function SubCategoryProducts($name)
    {
        $subcategory = Subcategory::where('name', $name)->first();
        //here we are fetching row from subcategory the where name = $name
        $products = $subcategory->products;
        $categorytype = $subcategory->category;
        //here we are using many to one relation one category has many products
        return view ('front-end.categoryWise-products.categoryWise-products', compact('products','categorytype'));
    }

    public function CityAjax($id)
    {
        $products = Product::where('user_id',$id)->get();
        if($products)
        { return $products; }

        else
        { return 'aaa'; }


    }

    public function hotDeals($name)
    {
        if($category = Category::where('name', $name)->first())
        {
        $products = $category->products;
        }
        elseif ( $subcategory = Subcategory::where('name', $name)->first()) {
        $products = $subcategory->products;
        }
        else
        {
            $products = Product::all();
        }

        return view ('front-end.categoryWise-products.categoryWise-products', compact('products'));
    }

    public function cityProducts(Request $request)
    {
        $category_id =$request->category;
        $categorytype = Category::where('id',$category_id)->first();
        $cityname = $request->city;

            $products = Product::where('city', 'like', '%'.$cityname.'%')
            ->where('category_id',$category_id)->get();

            return view ('front-end.categoryWise-products.categoryWise-products', compact('products','categorytype'));
    }
    public function citySearchProducts(Request $request)
    {
        $products = Product::where('title','LIKE','%'.$request->search.'%')
        ->where('city', 'like', '%'.$request->city.'%')->get();
        $category = Category::all();
        return view ('front-end.search.search-products', compact('products','category'));

    }
}





