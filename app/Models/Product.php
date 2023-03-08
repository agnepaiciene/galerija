<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

//    public static function create(array $all)
//    {
//    }

//    public static function filter(mixed $filter)
//    {
//    }


    public static function find($id)
    {
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function scopeFilter(Builder $query, $filter)
    {
        if ($filter != null) {
            if (isset($filter->artname) && $filter->artname != null) {
                $query->where("artname", "like", "%$filter->artname%");
            }

            if (isset($filter->name) && $filter->name != null) {
                $query->where("name", "like", "%$filter->name%");
            }
            if (isset($filter->surname) && $filter->surname != null) {
                $query->where("surname", "=", "$filter->surname");
            }
            if (isset($filter->price) && $filter->price != null) {
                $query->where("price", "=", "$filter->price");
            }
        }
        $query->orderBy("artname", "ASC");
    }
}
