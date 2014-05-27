<?php namespace Cn\StatusBoard;

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
            'description' => 'Display a status board for CN',
            'author' => 'Cn',
            'icon' => 'icon-tablet'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Cn\StatusBoard\Components\StatusBoard' => 'statusBoard'
        ];
    }

    public function registerNavigation()
    {
        return [
            'statusboard' => [
                'label' => 'Status Board',
                'url' => \Backend::url('cn/statusboard/employees'),
                'icon' => 'icon-tablet',
                'permissions' => ['cn.statusboard.*'],
                'order' => 500,

                'sideMenu' => [
                    'employees' => [
                        'label' => 'Employees',
                        'url' => \Backend::url('cn/statusboard/employees'),
                        'icon' => 'icon-smile-o',
                        'permissions' => ['cn.statusboard.*']
                    ],
                    'logs' => [
                        'label' => 'Logs',
                        'url' => \Backend::url('cn/statusboard/employeestatuslogs'),
                        'permissions' => ['cn.statusboard.*'],
                        'icon' => 'icon-book'
                    ]
                ]
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'cn.statusboard.manage_status_board' => ['label' => 'Manage Status Board']
        ];
    }

}
