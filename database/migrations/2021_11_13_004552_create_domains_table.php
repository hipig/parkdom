<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('名称');
            $table->string('logo')->nullable()->comment('LOGO');
            $table->decimal('estimated_price',10, 2)->unsigned()->default(0)->comment('预估价格');
            $table->string('currency', 64)->nullable()->comment('币种');
            $table->string('suffix', 64)->nullable()->comment('后缀');
            $table->integer('length')->default(0)->comment('长度');
            $table->integer('age')->default(0)->comment('年龄');
            $table->text('description')->nullable()->comment('域名描述');

            $table->string('seo_title')->nullable()->comment('网站标题');
            $table->string('seo_keywords')->nullable()->comment('网站关键词');
            $table->text('seo_description')->nullable()->comment('网站描述');
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
        Schema::dropIfExists('domains');
    }
}
