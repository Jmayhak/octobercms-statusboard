<?php namespace Cn\StatusBoard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('cn_statusboard_employees', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('full_name');
            $table->enum('status', ['active', 'away', 'off']);
            $table->string('personal_phone');
        });
    }

    public function down()
    {
        Schema::drop('cn_statusboard_employees');
    }

}
