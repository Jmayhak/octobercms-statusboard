<?php namespace Cn\StatusBoard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEmployeeStatusLogsTable extends Migration
{

    public function up()
    {
        Schema::create('cn_statusboard_employee_status_logs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->enum('status', ['active', 'away', 'off']);
            $table->text('comment');
            $table->integer('cn_statusboard_employee_id')->unsigned();
        });

        Schema::table('cn_statusboard_employees', function($table) {
            $table->dropColumn('status');
        });
    }

    public function down()
    {
        Schema::drop('cn_statusboard_employee_status_logs');
        Schema::table('cn_statusboard_employees', function($table) {
            $table->enum('status', ['active', 'away', 'off']);
        });
    }

}
