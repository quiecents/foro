<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The posts that belong to the tag.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * Get the category that owns the tag.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
