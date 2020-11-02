<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{

    protected $table = 'tests';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'email'];

    
}
