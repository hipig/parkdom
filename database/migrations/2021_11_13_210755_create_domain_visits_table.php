<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id')->nullable();
            $table->string('host');
            $table->string('ip');
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('device')->nullable();
            $table->string('device_type')->nullable();
            $table->string('platform')->nullable();
            $table->string('platform_version')->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
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
        Schema::dropIfExists('domain_visits');
    }
}
