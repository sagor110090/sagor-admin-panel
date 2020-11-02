<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test1 extends Model
{

    protected $table = 'test1s';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'email'];

    
}
