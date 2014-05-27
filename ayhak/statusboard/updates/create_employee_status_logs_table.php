<?php namespace Mayhak\StatusBoard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEmployeeStatusLogsTable extends Migration
{

    public function up()
    {
        Schema::create('mayhak_statusboard_employee_status_logs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->enum('status', ['active', 'away', 'off']);
            $table->text('comment');
            $table->integer('mayhak_statusboard_employee_id')->unsigned();
        });

        Schema::table('mayhak_statusboard_employees', function($table) {
            $table->dropColumn('status');
        });
    }

    public function down()
    {
        Schema::drop('mayhak_statusboard_employee_status_logs');
        Schema::table('mayhak_statusboard_employees', function($table) {
            $table->enum('status', ['active', 'away', 'off']);
        });
    }

}
