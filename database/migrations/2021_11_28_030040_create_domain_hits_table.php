<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainHitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_hits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id')->nullable()->comment('域名ID');
            $table->string('date')->comment('日期');
            $table->integer('times')->default(0)->comment('点击次数');
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
        Schema::dropIfExists('domain_hits');
    }
}
