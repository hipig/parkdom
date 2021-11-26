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
            $table->unsignedBigInteger('domain_id')->comment('域名ID');
            $table->string('name')->comment('姓名');
            $table->string('email')->comment('邮箱');
            $table->string('phone')->nullable()->comment('手机号码');
            $table->decimal('offer_price', 10)->comment('报价');
            $table->string('ip')->comment('IP');
            $table->string('country')->nullable()->comment('国家');
            $table->string('country_code')->nullable()->comment('国家编码');
            $table->text('content')->nullable()->comment('内容');
            $table->boolean('is_noticed')->default(false)->comment('是否已通知');
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
