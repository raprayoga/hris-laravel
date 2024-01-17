<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_category', function (Blueprint $table) {
            $table->id();
            $table->string('job_category');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('job_divisi', function (Blueprint $table) {
            $table->id();
            $table->string('job_divisi');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_category_id');
            $table->foreign('job_category_id')->references('id')->on('job_category')->onDelete('cascade');
            $table->unsignedBigInteger('job_divisi_id');
            $table->foreign('job_divisi_id')->references('id')->on('job_category')->onDelete('cascade');
            $table->string('posisi');
            $table->string('jenis');
            $table->string('tingkat_pengalaman');
            $table->text('detail');
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
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_divisi');
        Schema::dropIfExists('job_category');
    }
};
