<?php

namespace Emiolo\User\Routing;

use Illuminate\Support\Facades\Route;

class Router
{

    private $namespace = "\\Emiolo\\User\\Controllers";

    public static function auth()
    {
        $namespace = $this->namespace;
        Route::group(["namespace" => null], function() use($namespace) {

            // Authentication Routes...
            Route::get("login", "{$namespace}\\Auth\\AuthController@showLoginForm");
            Route::post("login", "{$namespace}\\Auth\\AuthController@login");
            Route::get("logout", "{$namespace}\\Auth\\AuthController@logout");

            // Registration Routes...
            Route::get("register", "{$namespace}\\Auth\\AuthController@showRegistrationForm");
            Route::post("register", "{$namespace}\\Auth\\AuthController@register");

            // Password Reset Routes...
            Route::get("password/reset/{token?}", "{$namespace}\\Auth\\PasswordController@showResetForm");
            Route::post("password/email", "{$namespace}\\Auth\\PasswordController@sendResetLinkEmail");
            Route::post("password/reset", "{$namespace}\\Auth\\PasswordController@reset");
        });
    }

    public static function adminUserRoutes()
    {
        $namespace = $this->namespace;
        Route::group([
            "prefix" => "admin/users",
            "as" => "admin.users.",
            "namespace" => null,
            "middleware" => ["web", "auth"]
                ], function() use($namespace) {

            Route::get("/dashboard", ["uses" => "{$namespace}\\UsersAdminController@index", "as" => "index"]);
            Route::get("/create", ["uses" => "{$namespace}\\UsersAdminController@create", "as" => "create"]);
            Route::post("/store", ["uses" => "{$namespace}\\UsersAdminController@store", "as" => "store"]);
            Route::get("{id}/edit", ["uses" => "{$namespace}\\UsersAdminController@edit", "as" => "edit"]);
            Route::put("{id}/update", ["uses" => "{$namespace}\\UsersAdminController@update", "as" => "update"]);
            Route::get("{id}/show", ["uses" => "{$namespace}\\UsersAdminController@show", "as" => "show"]);
            Route::get("{id}/delete", ["uses" => "{$namespace}\\UsersAdminController@delete", "as" => "delete"]);
            Route::delete("{id}/delete", ["uses" => "{$namespace}\\UsersAdminController@destroy", "as" => "delete"]);
        });
    }

}
