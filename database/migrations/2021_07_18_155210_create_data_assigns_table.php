<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_assigns', function (Blueprint $table) {
			$table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('crmdata_id')->unsigned();
			$table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->userstamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('crmdata_id')->references('id')->on('crmdatas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_assigns');
    }
}
