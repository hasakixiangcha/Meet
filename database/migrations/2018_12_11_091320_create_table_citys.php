<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCitys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citys', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('code',50)->default('')->comment('行政编码');
            $table->string('name',191)->default('')->comment('名称');
            $table->integer('parent_id')->default(0)->comment('父id');
            $table->string('first_letter',10)->default('')->comment('首字母');
            $table->tinyInteger('level')->default(0)->comment('城市等级');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citys');
    }
}
