<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTypesMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_types_mapping', function (Blueprint $table) {
        	$table->primary('id');
            $table->increments('id');
            $table->integer('services_id');
            $table->integer('types_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services_types_mapping');
    }
}
