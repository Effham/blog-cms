<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $guarded = [];
    //
    protected $fillable =
    [
        'title' , 'post_image' , 'body'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getPostImageAttribute($value)
    {
        // return asset($value);
        if($value)
        {
            return asset('storage/' . $value);
        }


    }
}
