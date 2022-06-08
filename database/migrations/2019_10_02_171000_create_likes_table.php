<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('user_id')->unsigned(); 
            $table->integer('product_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); 
            $table->timestamps();

            /*
            1) if u want to make it foreign key in another table then change it to increments only. change bigIncrements to increments

            2) unsigned mean that value can never be negative bcoz its a foreign key it shows a relationship

            3) foreign is type refernces mean the key from the parent table on mean the parent table but the name should be of the migrations and on delete cascade mean also delete from from parent anf child both table */
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
