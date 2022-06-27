<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipaddress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('countryId');
            $table->string('ipName');
            $table->integer('timeExpried');
            $table->integer('timeRemain');
            $table->integer('status')->length(1);
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
        Schema::dropIfExists('ipaddress');
    }
}
