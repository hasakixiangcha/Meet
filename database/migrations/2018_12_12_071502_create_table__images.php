<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //图片表
        if(!Schema::hasTable('images')) {
            Schema::create('images', function (Blueprint $table) {
                $table->increments('id');
                $table->tinyInteger('type')->default(0)->comment('图片类型，0代表会员图片');
                $table->unsignedInteger('tableid')->default(0)->comment('对应的外表ID');
                $table->string('path', 191)->default('')->comment('图片的路径');
                $table->string('title', 191)->default('')->comment('图片描述');
                $table->tinyInteger('status')->default(1)->comment('图片状态');
                $table->timestamps();
            });
        }
        //择偶表
        if(!Schema::hasTable('spouses')){
            Schema::create('spouses', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('mid')->foreign()->references('id')->on('members')->default(0)->comment('对应的会员ID');
                $table->tinyInteger('sex')->default(0)->comment('择偶性别,0代表不限');
                $table->unsignedTinyInteger('age')->default(0)->comment('择偶年龄,0代表不限');
                $table->tinyInteger('marry_status')->default(0)->comment('婚姻状况,0代表不限');
                $table->tinyInteger('education')->default(0)->comment('学历,0代表不限');
                $table->tinyInteger('salary')->default(0)->comment('月薪,0代表不限');
                $table->tinyInteger('house_cond')->default(0)->comment('住房条件,0代表不限');
                $table->tinyInteger('has_child')->default(0)->comment('有无孩子,0代表不限');
                $table->tinyInteger('industry')->default(0)->comment('从事行业,0代表不限');
                $table->tinyInteger('hign')->default(0)->comment('身高,0代表不限');
                $table->tinyInteger('nation')->default(0)->comment('所属民族,0代表不限');
                $table->unsignedSmallInteger('city')->default(0)->comment('所属城市,0代表不限');
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->engine='Innodb';
            });
        }

        //会员信息完善
        if(Schema::hasTable('members')){
            Schema::table('members', function (Blueprint $table) {
                $table->tinyInteger('education')->default(0)->comment('学历,0代表不限');
                $table->tinyInteger('salary')->default(0)->comment('月薪,0代表不限');
                $table->tinyInteger('house_cond')->default(0)->comment('住房条件,0代表不限');
                $table->tinyInteger('has_child')->default(0)->comment('有无孩子,0代表不限');
                $table->tinyInteger('industry')->default(0)->comment('从事行业,0代表不限');
                $table->tinyInteger('hign')->default(0)->comment('身高,0代表不限');
                $table->tinyInteger('nation')->default(0)->comment('所属民族,0代表不限');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Images');
        Schema::dropIfExists('Spouses');

        Schema::table('members',function (Blueprint $table){
            if(Schema::hasColumn('members','education')){
                $table->dropColumn('education');
            }
            if(Schema::hasColumn('members','salary')){
                $table->dropColumn('salary');
            }
            if(Schema::hasColumn('members','house_cond')){
                $table->dropColumn('house_cond');
            }
            if(Schema::hasColumn('members','has_child')){
                $table->dropColumn('has_child');
            }
            if(Schema::hasColumn('members','industry')){
                $table->dropColumn('industry');
            }
            if(Schema::hasColumn('members','hign')){
                $table->dropColumn('hign');
            }
            if(Schema::hasColumn('members','nation')){
                $table->dropColumn('nation');
            }
        });
    }
}
