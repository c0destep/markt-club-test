<?php
/*
 * This file is part of App Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Controllers\AuthController;
use App\Controllers\UserController;
use Framework\Routing\RouteCollection;

App::router()->serve('http://localhost:8080', static function (RouteCollection $routes): void {
    // Auth Routes
    // GET  URI /  - AuthController::login    - auth.login
    // POST URI /  - AuthController::identify - auth.identify
    $routes->get('/', [AuthController::class, 'login'], 'auth.login');
    $routes->get('/logout', [AuthController::class, 'logout'], 'auth.logout');
    $routes->post('/', [AuthController::class, 'identify'], 'auth.identify');

    // User Routes
    // GET  URI /users             - UserController::index  - users.index
    // POST URI /users/new         - UserController::new    - users.new
    // GET  URI /users/{id}/edit   - UserController::edit   - users.edit
    // POST URI /users/{id}/update - UserController::update - users.update
    // GET  URI /users/{id}/remove - UserController::remove - users.remove
    $routes->presenter('/users', UserController::class, 'users', ['show', 'delete']);
    $routes->notFound(static fn() => not_found());
});
