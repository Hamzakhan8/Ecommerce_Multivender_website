<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\FormArticleRequest;
use App\User;
use App\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

/*

    THIS MIDDLEWARE IS APPLIOD TO ALL THE FUNCTONS DEFINED HERE COZ WE CALLED IT IN CONSTRUCTOR

    public function __construct(){
        $this->middleware('auth');
    }
    
    THIS MIDDLEWARE IS APPLlIeD TO ONLY THOSE FUNCTONS wHICH WE HAVE DEFINED HERE AFTER ONLY  COZ WE CALLED IT IN CONSTRUCTOR
    public function __construct(){
        $this->middleware('auth',['only'=>'create']);

        FOR 2 FUNCTIONS 

        $this->middleware('auth',['only'=>['create','index'] ]);
   }    

     USE MULTPLE MIDDLEWARES IN FIRST ARRAY FOR MULTIPLE FUNCTIONS IN SECOND ARRAY
   public function __construct(){
        $this->middleware(['auth', 'isAdmin'],['only'=>['create','index'] ]);
    }

*/

    public function __construct(){
        $this->middleware(['auth', 'notAdmin'],['only'=>['create','index'] ]);
    }

    public function index()
    {
        $a = Article::all();
        return view('article.article',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('article.create-article',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // here we want to use the request we have made 
    // 1) import the request file name
    // 2) replace(Request $request) by (ur_request_name $request)
    public function store(FormArticleRequest $request)
    {
        $abc = new Article();
        $abc->title = $request->title;
        $abc->description = $request->description;
        $abc->user_id = auth()->user()->id;        
        $abc->save();

        // abc wale article id us k sath jo multiple tags hum ne array me pass ki hain un ki id ko mila k pivot table me store karti hain matlab article_table me dono article and tags ki value store ho rahi hain
        $abc->tags()->attach($request->input('tags'));
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('article.single-article',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit-article',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $description = $request->description;
        $old = Article::find($id);
        $old->title = $title;
        $old->description = $description;
        $old->save();
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $art = Article::find($id);
        $art->delete();

        return redirect()->route('article.index');
    }

    public function one2one()
    {
        if(auth()->check()){
        $id = auth()->user()->id;
        $article = User::find($id)->article->get();

        return view('article.one2one',compact('article'));
        }
        else
        {
            return 'u r not logged in go and back first u have to login';
                    
        }
    }


    public function middlewareTesting()
    {
        return view('article.middlewareTesting');
    }

    public function TagSearch($tag)
    {
        $tag = Tag::find($tag);
        return view('article.single-tag',compact('tag'));
    }
}
