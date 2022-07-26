<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','slug','excerpt'];

    public function scopeFilter($q,$filter)  //since filter() method is use in blogController we use scopeFilter, give Filter after scope
    {
       $q->when($filter['search']??false,function($q,$search){
            // $search = request("search");
            $q->where(function($q) use($search){
            $q->orWhere("title","like","%$search%")
            ->orWhere("description","like","%$search%");
            });
        });
        $q->when($filter['category']??false,function($query,$slug){
            $query->whereHas('category',function($q) use($slug) {
                $q->where('slug',$slug);
            });
        });

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}