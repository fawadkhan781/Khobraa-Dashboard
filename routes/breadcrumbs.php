<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('receipt.index', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
    $trail->push('Receipt', route('recipts'));
});

Breadcrumbs::for('jobs.index', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
    $trail->push('Jobs', route('jobs'));
});

Breadcrumbs::for('staff.index', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
    $trail->push('Staff', route('staff'));
});

Breadcrumbs::for('customers.index', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
    $trail->push('Customers', route('customer'));
});