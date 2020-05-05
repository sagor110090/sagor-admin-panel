<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $table = 'categories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'image'];

    
}
