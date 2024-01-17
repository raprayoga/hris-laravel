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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('job_category_id')->after('password')->nullable();
            $table->foreign('job_category_id')->references('id')->on('job_category')->onDelete('cascade');
            $table->unsignedBigInteger('job_divisi_id')->after('job_category_id')->nullable();
            $table->foreign('job_divisi_id')->references('id')->on('job_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['job_category_id']);
            $table->dropColumn('job_category_id');
            $table->dropForeign(['job_divisi_id']);
            $table->dropColumn('job_divisi_id');
        });
    }
};
