<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id")
            ->after("slug")
            ->nullable();
                
                // ->default(16)
                // ->after();
            $table->foreign("user_id")
                  ->references("id") 
                  ->on("users");
                  //versione più compatta
             $table->foreignId("category_id")
                 ->nullable()   
                 ->after("user_id")
                 ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //prima di cancellare la colonna occorre togliere il collegamente di tipo foreign
            $table->dropForeign("user_id");
            $table->dropColumn("user_id");
            $table->dropForeign("category_id");
            $table->dropColumn("category_id");
        });
    }
}
