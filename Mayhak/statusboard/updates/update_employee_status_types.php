<?php namespace Cn\StatusBoard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateEmployeeStatusTypes extends Migration
{

    public function up()
    {
        Schema::table('cn_statusboard_employee_status_logs', function ($table) {
            $table->dropColumn('status');
        });

        Schema::table('cn_statusboard_employee_status_logs', function ($table) {
            $table->enum('status', ['active', 'away', 'otl', 'pto']);
        });
    }

    public function down()
    {
        Schema::table('cn_statusboard_employee_status_logs', function ($table) {
            $table->dropColumn('status');
        });

        Schema::table('cn_statusboard_employee_status_logs', function ($table) {
            $table->enum('status', ['active', 'away', 'off']);
        });
    }

}
