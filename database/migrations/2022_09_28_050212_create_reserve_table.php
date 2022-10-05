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
        Schema::create('reserve', function (Blueprint $table) {
            $table->id();
            $table->date('ingress');
            $table->date('egress');
            $table->string('status');
            $table->unsignedBigInteger('detail_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('detail_id')->references('id')->on('detail')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserve');
    }
};
