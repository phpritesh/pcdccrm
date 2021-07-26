<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterimportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterimports', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->integer('import_success')->default(0);
			$table->integer('import_fail')->default(0);
			$table->text('import_successdata')->nullable();
			$table->text('import_faildata')->nullable();
			$table->integer('status')->default(0);
            $table->timestamps();
			$table->softDeletes();
            $table->userstamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masterimports');
    }
}
