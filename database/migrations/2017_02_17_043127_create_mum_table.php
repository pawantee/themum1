<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('mums', function (Blueprint $table) {
            $table->increments('id_mum');
            $table->string('name_mum');
            $table->string('crad');
            $table->string('profession_mum');
            $table->string('religion_mum');
            $table->string('study_mum');
            $table->string('tel_mum');

            $table->string('name_fathter');
            $table->string('crad_father');
            $table->string('profession_fathter');
            $table->string('religion_fathter');
            $table->string('study_fathter');
            $table->string('tel_fathter');

            $table->string('address');
            $table->string('zipcod');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mums');
    }
}
