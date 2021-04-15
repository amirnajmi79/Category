<?php

namespace AmirNajmi\Category;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        use SoftDeletes;
    public $table = 'categories';
    protected $guarded = [];
   
        
    public function categorizables($model)
    {
        return $this->morphedByMany($model, 'categorizable');
    }
}
