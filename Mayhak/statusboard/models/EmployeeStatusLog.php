<?php namespace Mayhak\StatusBoard\Models;

use Model;

/**
 * EmployeeStatusLogs Model
 */
class EmployeeStatusLog extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mayhak_statusboard_employee_status_logs';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['status', 'comment', 'mayhak_statusboard_employee_id'];

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
        'employee' => ['Employee', 'foreignKey' => 'mayhak_statusboard_employee_id']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}