<?php

/**
 * Route URI's
 */
Route::group(['prefix' => config('GondaYtUploads.routes.prefix')], function () {

    /**
     * Authentication
     */
    Route::get(config('GondaYtUploads.routes.authentication_uri'), function () {
        return redirect()->to(GondaYtUploads::createAuthUrl());
    });

    /**
     * Redirect
     */
    Route::get(config('GondaYtUploads.routes.redirect_uri'), function (Illuminate\Http\Request $request) {
        if (!$request->has('code')) {
            throw new Exception('$_GET[\'code\'] is not set. Please re-authenticate.');
        }

        $token = GondaYtUploads::authenticate($request->get('code'));

        GondaYtUploads::saveAccessTokenToDB($token);

        return redirect(config('GondaYtUploads.routes.redirect_back_uri', '/'));
    });

});
