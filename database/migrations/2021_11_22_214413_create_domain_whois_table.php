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
            $table->unsignedBigInteger('domain_id')->comment('域名ID');
            $table->string('registrar')->nullable()->comment('注册商');
            $table->string('created_date')->nullable()->comment('创建日期');
            $table->string('expired_date')->nullable()->comment('过期日期');
            $table->string('name_server')->nullable()->comment('域名服务器');
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
