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
        Schema::create('cottage', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('name', 45);
            $table->string('description', 250);
            $table->string('beedrooms');
            $table->string('toilets');
            $table->string('price');
            $table->string('image')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cottage');
    }
};
