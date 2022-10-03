<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRegionsTable extends Migration
{
   

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->smallInteger('id', true);
			$table->string('name', 191)->unique();
			$table->smallInteger('country_id')->index();
            $table->string('hasc', 6)->nullable();
            $table->integer('zone_id');
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
        Schema::dropIfExists('regions');
    }
}
