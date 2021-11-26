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
            $table->unsignedBigInteger('category_id')->nullable()->comment('分类ID');
            $table->string('domain')->unique()->comment('名称');
            $table->string('logo')->nullable()->comment('LOGO');
            $table->decimal('price',10, 2)->unsigned()->nullable()->comment('价格');
            $table->decimal('min_price',10, 2)->unsigned()->nullable()->comment('最低价格');
            $table->string('currency', 64)->nullable()->comment('币种');
            $table->string('suffix', 64)->nullable()->comment('后缀');
            $table->integer('length')->default(0)->comment('长度');
            $table->integer('age')->default(0)->comment('年龄');
            $table->text('tags')->nullable()->comment('标签');
            $table->text('description')->nullable()->comment('描述');
            $table->tinyInteger('allow_offer')->default(1)->comment('是否允许报价');

            $table->string('seo_title')->nullable()->comment('网站标题');
            $table->string('seo_keywords')->nullable()->comment('网站关键词');
            $table->text('seo_description')->nullable()->comment('网站描述');
            $table->timestamp('whois_updated_at')->nullable()->comment('Whois更新时间');
            $table->boolean('park_status')->default(false)->comment('停放状态');
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
