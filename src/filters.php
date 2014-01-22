<?php

/**
 * This file is part of Laravel Credentials by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


// check if the user is logged in and their access level
Route::filter('credentials', function ($route, $request, $value) {
    if (!Credentials::check()) {
        Log::info('User tried to access a page without being logged in', array('path' => $request->path()));
        if (Request::ajax()) {
            return App::abort(401, 'Action Requires Login');
        }
        Session::flash('error', 'You must be logged in to perform that action.');
        return Redirect::guest(URL::route('account.login'));
    }

    if (!Credentials::hasAccess($value)) {
        Log::warning('User tried to access a page without permission', array('path' => $request->path(), 'permission' => $value));
        return App::abort(403, ucwords($value).' Permissions Are Required');
    }
});
