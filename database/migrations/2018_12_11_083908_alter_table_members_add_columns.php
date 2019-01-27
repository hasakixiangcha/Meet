<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMembersAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('members')){
            Schema::table('members', function (Blueprint $table) {
                //
                $table->tinyInteger('marray_status')->default(0)->comment('婚姻状况,0代表不限');
                $table->tinyInteger('status')->default(1)->comment('会员状态,1代表正常使用,0代表不能使用,2代表在审核状态');
                $table->dateTime('last_login_time')->comment('上次登录时间');
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
        Schema::table('members', function (Blueprint $table) {
            //
            if(Schema::hasColumn('members','marray_status')){
                $table->dropColumn('marray_status');
            }
            if(Schema::hasColumn('members','status')){
                $table->dropColumn('status');
            }
            if(Schema::hasColumn('members','last_login_time')){
                $table->dropColumn('last_login_time');
            }

        });
    }
}
