<?php namespace Cn\StatusBoard\Models;

use Model;

/**
 * Employee Model
 */
class Employee extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cn_statusboard_employees';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['full_name', 'personal_number'];

    /**
     * @var array Validation rules
     */
    public $rules = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'logs' => ['\Cn\StatusBoard\Models\EmployeeStatusLog', 'primaryKey' => 'cn_statusboard_employee_id']
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}