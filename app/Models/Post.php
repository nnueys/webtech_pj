<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'tag',
        'description',
        'view_count',
        'image'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    private function numberToK($value) {
        return ($value >= 1000000)
            ? round($value / 1000000, 1) . 'm'
            : (
                ($value >= 1000)
                ? round($value / 1000, 1) . 'k'
                : $value
            );
    }

//    public function viewCount() : Attribute
//    {
//        return Attribute::make(
//            get: fn ($value) => $this->numberToK($value)
//        );
//    }
//
//    public function likeCount() : Attribute
//    {
//        return Attribute::make(
//            get: fn ($value) => $this->numberToK($value)
//        );
//    }
}
