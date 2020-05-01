<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('births', function (Blueprint $table) {
            $table->id();
            $table->string('pid_number')->index();
            $table->foreign('pid_number')->references('id_number')->on('people');
            $table->string('certificate_number')->unique();
            $table->string('place_of_birth');
            $table->string('hospital_of_birth');
            $table->string('father_id_number')->index();
            $table->foreign('father_id_number')->references('id_number')->on('people');
            $table->string('mother_id_number')->index();
            $table->foreign('mother_id_number')->references('id_number')->on('people');
            $table->string('informant_id_number')->index();
            $table->foreign('informant_id_number')->references('id_number')->on('people');
            $table->string('registrar_id_number')->index();
            $table->foreign('registrar_id_number')->references('id_number')->on('people');
            $table->date('date_of_birth');
            $table->date('date_of_issue');

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
        Schema::dropIfExists('births');
    }
}
