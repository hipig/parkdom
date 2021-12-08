<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名称');
            $table->string('icon')->nullable()->comment('图标');
            $table->integer('sort')->default(0)->comment('排序');
            $table->tinyInteger('status')->default(\App\Models\DomainCategory::STATUS_ENABLE)->comment('{{ __('Status') }}：1-启用 2-禁用');
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
        Schema::dropIfExists('domain_categories');
    }
}
