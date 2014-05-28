<?php namespace Mayhak\StatusBoard\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * EmployeeStatusLogs Back-end Controller
 */
class EmployeeStatusLogs extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mayhak.StatusBoard', 'statusboard', 'logs');
    }
}
