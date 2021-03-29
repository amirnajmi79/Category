<?php
namespace AmirNajmi\Category;


trait Categorizable
{
    public function categories()
    {
        return $this->morphToMany(Category::class, 'Categorizable');
    }

}
