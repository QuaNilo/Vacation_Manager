<?php

namespace App\View\Composers;

use App\Models\Permission;
use App\View\Menus\SideMenu;
use App\View\Menus\SimpleMenu;
use App\View\Menus\TopMenu;
use Illuminate\View\View;


class MenuComposer
{
    /**
     * Bind menu to the view.
     */
    public function compose(View $view): void
    {
        if (!is_null(request()->route())) {
            $layoutComposer = new LayoutComposer;
            //for production check if this make sense and remove the line
            $activeLayout = $layoutComposer->activeLayout($view); // for production we can hardcode the layout and comment this line
            //$activeLayout = 'side-menu'; // for production we can hardcode the layout

            $mainMenu = [];
            $pageName = request()->route()->getName();
            if ($activeLayout == "top-menu") {
                $mainMenu = TopMenu::menu();
            }

            if ($activeLayout == "side-menu") {
                $mainMenu = SideMenu::menu();
            }

            if ($activeLayout == "simple-menu") {
                $mainMenu = SimpleMenu::menu();
            }
            $mainMenu = $this->checkMenuPermissions($mainMenu);
            $view->with('mainMenu', $mainMenu);

            //$sideMenu = $this->checkMenuPermissions($sideMenu);
            $activeMenu = $this->activeMenu($pageName, $activeLayout);
            $view->with('firstLevelActiveIndex', $activeMenu['first_level_active_index']);
            $view->with('secondLevelActiveIndex', $activeMenu['second_level_active_index']);
            $view->with('thirdLevelActiveIndex', $activeMenu['third_level_active_index']);
            //$view->with('pageName', $pageName); // estava assim no midone acho que não preciso disto na view
        }
    }


    /**
     * Set active menu & submenu.
     */
    public function activeMenu($pageName, $layout): array
    {
        $firstLevelActiveIndex = '';
        $secondLevelActiveIndex = '';
        $thirdLevelActiveIndex = '';


        if ($layout == 'top-menu') {
            foreach (TopMenu::menu() as $menuKey => $menu) {
                if (isset($menu['route_name']) && (request()->routeIs($menuKey) || ($menu['route_name'] == $pageName && empty($firstPageName)))) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && (request()->routeIs($subMenuKey) || ($subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)))) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && (request()->routeIs($lastSubMenuKey) || $lastSubMenu['route_name'] == $pageName)) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        } else if ($layout == 'simple-menu') {
            foreach (SimpleMenu::menu() as $menuKey => $menu) {
                if ($menu !== 'divider' && isset($menu['route_name']) && (request()->routeIs($menuKey) || ($menu['route_name'] == $pageName && empty($firstPageName)))) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && (request()->routeIs($subMenuKey) || ($subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)))) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && (request()->routeIs($lastSubMenuKey) || $lastSubMenu['route_name'] == $pageName)) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            foreach (SideMenu::menu() as $menuKey => $menu) {
                if ($menu !== 'divider' && isset($menu['route_name']) && (request()->routeIs($menuKey) || ($menu['route_name'] == $pageName && empty($firstPageName)))) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && (request()->routeIs($subMenuKey) || ($subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)))) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && (request()->routeIs($lastSubMenuKey) || $lastSubMenu['route_name'] == $pageName)) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        }

        return [
            'first_level_active_index' => $firstLevelActiveIndex,
            'second_level_active_index' => $secondLevelActiveIndex,
            'third_level_active_index' => $thirdLevelActiveIndex
        ];
    }

    /**
     * Determin if the current user have permissions to see the menu, unset if not.
     * Also check if visible is present and uncheck all that are not visible
     */
    public function checkMenuPermissions($currentMenu): array
    {
        foreach ($currentMenu as $menuKey => $menu) {
            //check is visible is present and set to false to unset the menu
            if (isset($menu['visible']) && !$menu['visible']) {
                unset($currentMenu[$menuKey]);
                continue;
            }
            //check if can't access the main menus
            if (!empty($menu['permissions']) && (auth()->check() && !auth()->user()->can($menu['permissions']))) {
                unset($currentMenu[$menuKey]);
                continue;
            }
            if (isset($menu['sub_menu'])) {
                foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                    //check if can't access the subMenu
                    if (!empty($subMenu['permissions']) && (auth()->check() && !auth()->user()->can($subMenu['permissions']))) {
                        unset($currentMenu[$menuKey]['sub_menu'][$subMenuKey]);
                        continue;
                    }
                    if (isset($subMenu['sub_menu'])) {
                        foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                            //check if can't access the last subMenu
                            if (!empty($lastSubMenu['permissions']) && (auth()->check() && !auth()->user()->can($lastSubMenu['permissions']))) {
                                unset($currentMenu[$menuKey]['sub_menu'][$subMenuKey]['sub_menu'][$lastSubMenuKey]);
                                continue;
                            }
                        }
                    }
                }
            }
        }
        return $currentMenu;
    }
}
