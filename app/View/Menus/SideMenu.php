<?php

namespace App\View\Menus;

use App\Models\Permission;

class SideMenu
{
    /**
     * List of side menu items.
     */
    public static function menu(): array
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => __('Dashboard'),
                'route_name' => 'dashboard',
                'params' => [],
            ],
            'calendar' => [
                'icon' => 'calendar',
                'title' => __('Calendar'),
                'route_name' => 'calendar.index',
                'params' => [],
            ],
            'Company' => [
                'icon' => 'company',
                'title' => __('Company'),
                'permissions' => Permission::PERMISSION_MANAGE_APP,
                'sub_menu' => [
                    'companies.dashboard' => [
                        'icon' => 'list',
                        'route_name' => 'companies.dashboard',
                        'params' => [],
                        'title' => __('Dashboard')
                    ],
                    'users.pending' => [
                        'icon' => 'plus-circle',
                        'route_name' => 'companies.users.pending',
                        'params' => [],
                        'title' => __('Pending Users'),

                    ],
                ]
            ],
//            'demos.*' => [
//                'icon' => 'files',
//                'route_name' => 'demos.index',
//                'params' => [],
//                'title' => __('Demos'),
//                //'permissions' => Permission::PERMISSION_ADMIN_FULL_APP,
//                'visible' => auth()->user()->can(Permission::PERMISSION_ADMIN_FULL_APP),
//            ],
            'divider',
            'profile.show' => [
                'icon' => 'user',
                'route_name' => 'profile.show',
                'params' => [],
                'title' => __('My profile')
            ],
            'users' => [
                'icon' => 'users',
                'title' => __('Users'),
                'permissions' => Permission::PERMISSION_MANAGE_APP,
                'sub_menu' => [
                    'users.index' => [
                        'icon' => 'list',
                        'route_name' => 'users.index',
                        'params' => [],
                        'title' => __('List users')
                    ],
                    'users.create' => [
                        'icon' => 'plus-circle',
                        'route_name' => 'users.create',
                        'params' => [],
                        'title' => __('Create user'),

                    ],
                ]
            ],
            'teams' => [
                'icon' => 'network',
                'title' => __('Teams'),
                'permissions' => Permission::PERMISSION_MANAGE_APP,
                'sub_menu' => [
                    'teams.index' => [
                        'icon' => 'list',
                        'route_name' => 'teams.index',
                        'params' => [],
                        'title' => __('List Teams')
                    ],
                    'teams.create' => [
                        'icon' => 'plus-circle',
                        'route_name' => 'teams.create',
                        'params' => [],
                        'title' => __('Create Teams'),

                    ],
                ]
            ],
            'vacations' => [
                'icon' => 'tree-palm',
                'title' => __('Vacations'),
                'permissions' => Permission::PERMISSION_MANAGE_APP,
                'sub_menu' => [
                    'vacations.index' => [
                        'icon' => 'list',
                        'route_name' => 'vacations.index',
                        'params' => [],
                        'title' => __('List Vacations')
                    ],
                    'vacations.create' => [
                        'icon' => 'plus-circle',
                        'route_name' => 'vacations.create',
                        'params' => [],
                        'title' => __('Create Vacations'),

                    ],
                ]
            ],
            'translations' => [
                'icon' => 'globe',
                'route_name' => 'translations.index',
                'params' => [],
                'title' => __('Translations'),
                'permissions' => Permission::PERMISSION_ADMIN_FULL_APP,
            ],
            'settings' => [
                'icon' => 'settings',
                'route_name' => 'settings.index',
                'params' => [],
                'title' => __('Settings'),
                'permissions' => Permission::PERMISSION_ADMIN_APP,
            ],

        ];
    }
}
