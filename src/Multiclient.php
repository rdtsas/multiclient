<?php

namespace Rdtsas\Multiclient;

use Rdtsas\Multiclient\Models\Credentials;
use Illuminate\Support\Facades\Schema;
use Config;
use Exception;

class Multiclient
{
    /**
      * __constructor
      *
      * @return void
      */
    public function __constructor()
    {
    }


    /**
    * Method search conections
    *
    * @return void
    */
    public static function client()
    {
        $client = null;
        $driver = env('MC_DRIVER', 'multi-client');
        switch (env('MC_TYPE', 'domain')) {
            case 'domain':
            $client = app('request')->server('REQUEST_SCHEME')."://".
            app('request')->server('HTTP_HOST').
            app('request')->server('REDIRECT_BASE').
            "/".explode("/", str_replace(app('request')->server('REDIRECT_BASE'), "", app('request')->server('REQUEST_URI')))[1];
                break;
            case 'header':
            $client = app('request')->header('domain');
                break;
        }
        if (Schema::hasTable('credentials')) {
            $credentials = Credentials::where('domain', $client)->first();
            if ($credentials) {
                Config::set("database.connections.{$driver}.host", $credentials->host);
                Config::set("database.connections.{$driver}.port", $credentials->port);
                Config::set("database.connections.{$driver}.database", $credentials->database);
                Config::set("database.connections.{$driver}.username", $credentials->username);
                Config::set("database.connections.{$driver}.password", $credentials->password);
            }
        }
    }
}
