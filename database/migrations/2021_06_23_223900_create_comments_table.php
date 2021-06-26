<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email');
            $table->longText('message');
            $table->integer('votes_positive')->default(0)->nullable();
            $table->integer('votes_negative')->default(0)->nullable();
            $table->enum('status', ['ACTIVE','DESACTIVE']);

            //relaciones

            $table->foreignId('commerce_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
