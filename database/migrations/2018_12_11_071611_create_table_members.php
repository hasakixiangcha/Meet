<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMembers extends Migration
{
    /**
     * 执行迁移的时候执行的方法
     *
     * @return void
     */
    public function up()
    {
       if(!Schema::hasTable('members')){
           Schema::create('members', function (Blueprint $table) {
               $table->increments('id');  //自动递增的整形已经是主键ID
               $table->char('account',11)->unique()->default('')->comment('账号，手机号码格式');
               $table->string('password',150)->default('')->comment('密码');
               $table->string('nickname',191)->default('')->comment('昵称');
               $table->unsignedInteger('avator')->default(0)->commennt('头像');
               $table->text('monologue')->comment('内心独白');
               $table->decimal('balance')->default('0.00')->comment('余额');
               $table->tinyInteger('sex')->default(0)->comment('性别,0代表未知');
               $table->year('year')->default('2000')->comment('出生年份');
               $table->char('month',2)->default('01')->comment('出身月份');
               $table->char('date',2)->default('01')->comment('出身日期');
               $table->unsignedSmallInteger('province')->default(0)->comment('省份ID');
               $table->unsignedSmallInteger('city')->default(0)->comment('城市ID');
               $table->string('qq',20)->nullable()->comment('qq账号');
               $table->string('weixin',100)->nullable()->comment('微信账号');
               $table->timestamps();  //自动创建两个字段created_at 和 updated_at
               $table->charset = 'utf8';
               $table->collation = 'utf8_unicode_ci';
               $table->engine='Innodb';
           });
       }
    }

    /**
     * 迁移回滚的时候执行的方法
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
