<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["techniques", "size", "genres", "product_id"];

    public static function create(array $all)
    {
    }

//    public static function filter(mixed $filter)
//    {
//    }

    public function category(){
        return $this->belongsTo(Product::class);
    }

//    public function scope(Builder $query){
//        $query->where("artname", "=",'Vasara');
//        $query->orderBy('artname', "ASC");
//    }

    public function scopeFilter(Builder $query, $filter)
    {
        if ($filter != null) {
            if (isset($filter->techniques) && $filter->techniques != null) {
                $query->where("techniques", "like", "%$filter->techniques%");
            }

            if (isset($filter->size) && $filter->size!= null) {
                $query->where("size", "like", "%$filter->size%");
            }
            if (isset($filter->genres) && $filter->genres != null) {
                $query->where("genres", "=", "$filter->genres");
            }

        }
        $query->orderBy("genres", "ASC");
    }
}
