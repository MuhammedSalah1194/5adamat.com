<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model{
    protected $table ='pages';

    protected $fillable = ['name','desc','keywords','meta_desc'];
}
