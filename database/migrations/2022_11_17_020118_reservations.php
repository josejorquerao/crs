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
        Schema::create('reservations', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->date('ingress');
            $table->date('egress');
            $table->string('status');
            $table->bigInteger('detail_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->biginteger('guest_id')->unsigned();
            $table->biginteger('cottage_id')->unsigned();
            $table->timestamps();
            $table->foreign('cottage_id')->references('id')->on('cottage');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('detail_id')->references('id')->on('detail');
            $table->foreign('guest_id')->references('id')->on('guest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
