<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->bigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('task_statuses');
            $table->bigInteger('tag_id')->nullable();
            $table->foreign('tag_id')->references('id')->on('task_tags');
            $table->dropColumn('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_id');
    }
}
