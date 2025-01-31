<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }



    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function getExcerpt(){
        return Str::limit(strip_tags($this->content), 200);
    }

    public function readingTime()
    {
       $mins = str_word_count($this->content) / 250;

       return ($mins < 1) ? 1 : $mins;
    }
}
