<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClinicFindings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClinicFindings',function (Blueprint $table){
            $table->id();
            $table->string('symptoms');
            $table->integer('updated_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->softdeletes('deleted_at');
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
        Schema::dropIfExists('ClinicFindings');
    }
}
