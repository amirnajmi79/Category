<?php

namespace AmirNajmi\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        use SoftDeletes;
    public $table = 'categories';
    protected $guarded = [];

}
