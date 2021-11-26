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
            $table->unsignedBigInteger('domain_id')->nullable()->comment('域名ID');
            $table->string('host')->comment('域名');
            $table->string('ip')->comment('IP');
            $table->string('country')->nullable()->comment('国家');
            $table->string('country_code')->nullable()->comment('国家编码');
            $table->string('device')->nullable()->comment('设备');
            $table->string('device_type')->nullable()->comment('设备类型');
            $table->string('platform')->nullable()->comment('平台');
            $table->string('platform_version')->nullable()->comment('平台版本');
            $table->string('browser')->nullable()->comment('浏览器');
            $table->string('browser_version')->nullable()->comment('浏览器版本');
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
