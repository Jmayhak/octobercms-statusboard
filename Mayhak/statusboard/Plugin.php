<?php namespace Mayhak\StatusBoard;

use System\Classes\PluginBase;

/**
 * StatusBoard Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'StatusBoard',
            'description' => 'Display a status board for your company',
            'author' => 'Mayhak',
            'icon' => 'icon-tablet'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Mayhak\StatusBoard\Components\StatusBoard' => 'statusBoard'
        ];
    }

    public function registerNavigation()
    {
        return [
            'statusboard' => [
                'label' => 'Status Board',
                'url' => \Backend::url('mayhak/statusboard/employees'),
                'icon' => 'icon-tablet',
                'permissions' => ['mayhak.statusboard.*'],
                'order' => 500,

                'sideMenu' => [
                    'employees' => [
                        'label' => 'Employees',
                        'url' => \Backend::url('mayhak/statusboard/employees'),
                        'icon' => 'icon-smile-o',
                        'permissions' => ['mayhak.statusboard.*']
                    ],
                    'logs' => [
                        'label' => 'Logs',
                        'url' => \Backend::url('mayhak/statusboard/employeestatuslogs'),
                        'permissions' => ['mayhak.statusboard.*'],
                        'icon' => 'icon-book'
                    ]
                ]
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'mayhak.statusboard.manage_status_board' => ['label' => 'Manage Status Board']
        ];
    }

}
