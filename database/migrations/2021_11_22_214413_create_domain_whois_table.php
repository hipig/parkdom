<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainWhoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_whois', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id');
            $table->string('registrar')->nullable();
            $table->string('created_date')->nullable();
            $table->string('expired_date')->nullable();
            $table->string('name_server')->nullable();
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
        Schema::dropIfExists('domain_whois');
    }
}
