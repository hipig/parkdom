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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('domain')->unique();
            $table->string('logo')->nullable();
            $table->decimal('price',10, 2)->unsigned()->nullable();
            $table->decimal('min_price',10, 2)->unsigned()->nullable();
            $table->string('currency', 64)->default('USD');
            $table->string('suffix', 64)->nullable();
            $table->integer('length')->default(0);
            $table->integer('age')->default(0);
            $table->text('tags')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('allow_offer')->default(1);

            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamp('whois_updated_at')->nullable();
            $table->boolean('park_status')->default(false);
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
