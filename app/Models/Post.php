<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['begintijd', 'eindtijd', 'category_id', 'time'];

    protected $casts = [
        'time' => 'time'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
