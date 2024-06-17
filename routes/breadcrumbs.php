<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('dashboard'), ['isHome' => true]);
});
Breadcrumbs::for('home-frontend', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('frontoffice.home'), ['isHome' => true]);
});

// Home > User
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Users'), route('users.index'));
});
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push(__('Create'), route('users.create'));
});
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show', $user));
});
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.show', $user);
    $trail->push(__('Update'), route('users.edit', $user));
});
Breadcrumbs::for('profile.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('home');
    $trail->push($user->name, route('profile.show'));
});
Breadcrumbs::for('users.own_edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.own_show', $user);
    $trail->push(__('Update'), route('users.edit', $user));
});

Breadcrumbs::for('companies.users.pending', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pending Users');
});

Breadcrumbs::for('api-tokens.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('API Tokens'), route('api-tokens.index'));
});


// Home > Role
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Roles'), route('roles.index'));
});
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push(__('Create'), route('roles.create'));
});
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('roles.index');
    $trail->push($model->name, route('roles.show', $model));
});
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('roles.show', $model);
    $trail->push(__('Update'), route('roles.edit', $model));
});

// Home > Calendar
Breadcrumbs::for('calendar.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Calendar'), route('calendar.index'));
});


// Home > Settings
Breadcrumbs::for('settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Settings'), route('settings.index'));
});
Breadcrumbs::for('settings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('settings.index');
    $trail->push(__('Create'), route('settings.create'));
});
Breadcrumbs::for('settings.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('settings.index');
    $trail->push($model->name, route('settings.show', $model));
});
Breadcrumbs::for('settings.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('settings.show', $model);
    $trail->push(__('Update'), route('settings.edit', $model));
});

// Home > Permissions
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Permissions'), route('permissions.index'));
});
Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push(__('Create'), route('permissions.create'));
});
Breadcrumbs::for('permissions.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('permissions.index');
    $trail->push($model->name, route('permissions.show', $model));
});
Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('permissions.show', $model);
    $trail->push(__('Update'), route('permissions.edit', $model));
});

// Home > Demo
Breadcrumbs::for('demos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Demos'), route('demos.index'));
});
Breadcrumbs::for('demos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('demos.index');
    $trail->push(__('Create'), route('demos.create'));
});
Breadcrumbs::for('demos.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('demos.index');
    $trail->push($model->name, route('demos.show', $model));
});
Breadcrumbs::for('demos.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('demos.show', $model);
    $trail->push(__('Update'), route('demos.edit', $model));
});


// Home > Team
Breadcrumbs::for('teams.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Teams'), route('teams.index'));
});
Breadcrumbs::for('teams.create', function (BreadcrumbTrail $trail) {
    $trail->parent('teams.index');
    $trail->push(__('Create'), route('teams.create'));
});
Breadcrumbs::for('teams.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('teams.index');
    $trail->push($model->name, route('teams.show', $model));
});
Breadcrumbs::for('teams.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('teams.show', $model);
    $trail->push(__('Update'), route('teams.edit', $model));
});


// Home > Vacation
Breadcrumbs::for('vacations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Vacations'), route('vacations.index'));
});
Breadcrumbs::for('vacations.create', function (BreadcrumbTrail $trail) {
    $trail->parent('vacations.index');
    $trail->push(__('Create'), route('vacations.create'));
});
Breadcrumbs::for('vacations.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('vacations.index');
    $trail->push($model->user->name, route('vacations.show', $model));
});
Breadcrumbs::for('vacations.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('vacations.show', $model);
    $trail->push(__('Update'), route('vacations.edit', $model));
});

Breadcrumbs::for('companies.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Create'), route('companies.create'));
});
Breadcrumbs::for('companies.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('companies.index');
    $trail->push($model->name, route('companies.show', $model));
});
Breadcrumbs::for('companies.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('companies.show', $model);
    $trail->push(__('Update'), route('companies.edit', $model));
});

Breadcrumbs::for('companies.dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Dashboard'), route('companies.dashboard'));
});

