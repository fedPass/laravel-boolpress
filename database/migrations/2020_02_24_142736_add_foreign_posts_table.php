<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //creo una nuova colonna che si chiamerà nomeModelDaCollegare_id
            $table->unsignedBigInteger('category_id')->after('id')->nullable();
            //creo la relazione tra le tabelle
            $table->foreign('category_id')->references('id')->on('categories');
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
            //elimino prima la chiave ('tabella_colonna_foreign')
            $table->dropForeign('posts_category_id_foreign');
            //poi posso eliminare la colonna
            $table->dropColumn('category_id');
        });
    }
}
