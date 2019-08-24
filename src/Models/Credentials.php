<?php

namespace Rdtsas\Multiclient\Models;

use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{

    /**
     * The name table reference model
     *
     * @var string
     */
    protected $table = "credentials";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','domain','host','username','password','database','port','status'
    ];


}
