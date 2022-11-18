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
        Schema::table('cottage', function (Blueprint $table) {
            $table->engine="InnoDB";

        });
        Schema::table('detail', function (Blueprint $table) {
            $table->engine="InnoDB";

        });
        Schema::table('contact', function (Blueprint $table) {
            $table->engine="InnoDB";

        });
        Schema::table('service', function (Blueprint $table) {
            $table->engine="InnoDB";

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
