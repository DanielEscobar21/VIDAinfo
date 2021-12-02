<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->longText('notes_treatment')->nullable();
            $table->string('medicament1_treatment');
            $table->string('dose1_treatment');

            $table->string('medicament2_treatment')->nullable();
            $table->string('dose2_treatment')->nullable();

            $table->string('medicament3_treatment')->nullable();
            $table->string('dose3_treatment')->nullable();

            $table->string('medicament4_treatment')->nullable();
            $table->string('dose4_treatment')->nullable();

            $table->string('medicament5_treatment')->nullable();
            $table->string('dose5_treatment')->nullable();

            $table->unsignedBigInteger('visit_id');
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');
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
        Schema::dropIfExists('treatments');
    }
}
