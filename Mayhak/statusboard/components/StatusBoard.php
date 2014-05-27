<?php namespace Mayhak\StatusBoard\Components;

use Cms\Classes\ComponentBase;
use Mayhak\StatusBoard\Models\Employee as Employee;
use Mayhak\StatusBoard\Models\EmployeeStatusLog as Log;

class StatusBoard extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'StatusBoard Component',
            'description' => 'Use this to display the status board'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    private function _getEmployees()
    {
        $employee_collection = Employee::orderBy('full_name')->get()->toArray();
        $employees = [];

        foreach ($employee_collection as $employee) {

            $status = 'away';
            $comment = '';

            $employee_status = Employee::find($employee['id'])->logs()->orderBy('created_at', 'desc')->first();
            if ($employee_status !== null) {
                $status = $employee_status->status;
                $comment = $employee_status->comment;
            }

            $employees[] = [
                'id' => $employee['id'],
                'full_name' => $employee['full_name'],
                'personal_phone' => $employee['personal_phone'],
                'status' => $status,
                'comment' => $comment
            ];
        }

        return $employees;
    }

    public function onRun()
    {
        $this->page['employees'] = $this->_getEmployees();

        $this->controller->addCss('/plugins/mayhak/statusboard/assets/css/statusBoard.css');
        $this->controller->addJs('/plugins/mayhak/statusboard/assets/javascript/statusBoard.js');
    }

    public function onEmployeeUpdate()
    {
        $id = post('id');
        $status = post('status');

        $employee = Employee::find($id);
        $employee_status =  new Log(['status' => $status]);
        $employee->logs()->save($employee_status);


        $this->page['employees'] = $this->_getEmployees();
    }

}