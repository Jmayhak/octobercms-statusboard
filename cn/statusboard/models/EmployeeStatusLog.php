<?php namespace Cn\StatusBoard\Models;

use Model;

/**
 * EmployeeStatusLogs Model
 */
class EmployeeStatusLog extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cn_statusboard_employee_status_logs';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['status', 'comment', 'cn_statusboard_employee_id'];

    /**
     * @var array Validation rules
     */
    public $rules = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'employee' => ['Employee', 'foreignKey' => 'cn_statusboard_employee_id']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}