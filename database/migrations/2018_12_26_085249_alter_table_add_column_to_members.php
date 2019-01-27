<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAddColumnToMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            //
            $table->string('intrest',100)->default('')->comment('兴趣爱好');
            $table->string('workstatus',100)->default('')->comment('工作情况');
            $table->string('character',100)->default('')->comment('性格特点');
            $table->string('others',100)->default('')->comment('其他标签');
            $table->text('lover')->nullable()->comment('喜欢的人');
        });
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
            $table->dropColumn('intrest');
            $table->dropColumn('workstatus');
            $table->dropColumn('character');
            $table->dropColumn('others');
            $table->dropColumn('lover');
        });
    }
}
