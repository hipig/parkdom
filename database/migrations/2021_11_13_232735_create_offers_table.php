<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->decimal('offer_price', 10);
            $table->string('ip');
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_noticed')->default(false);
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
        Schema::dropIfExists('offers');
    }
}
