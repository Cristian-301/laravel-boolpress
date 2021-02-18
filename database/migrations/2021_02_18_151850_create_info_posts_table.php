<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // <--- aggiungiamo la colonna degli ID dei post
            //post status: public/private/draft
            $table->string('post_status', 7);
            //comment status: open/closed/private
            $table->string('comment_status', 7);
            //$table->timestamps();

            // relazione fra tabelle
            $table->foreign('post_id') // <--- scelgo la chiave esterna
                ->references('id') // <--- colonna con cui farò il match
                ->on('post'); // <--- tabella
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_posts');
    }
}
