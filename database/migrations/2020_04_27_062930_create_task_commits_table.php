<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_commits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            // Поле которое будет внешним ключом
            $table->bigInteger('creator_id');
            // Добавление внешнего ключа (ограничения)
            $table->foreign('creator_id')->references('id')->on('users');
            // Поле которое будет внешним ключом
            $table->bigInteger('task_id');
            // Добавление внешнего ключа (ограничения)
            $table->foreign('task_id')->references('id')->on('tasks');
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
        Schema::dropIfExists('task_commits');
    }
}
