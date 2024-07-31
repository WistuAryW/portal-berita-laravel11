<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'categorie_id',
        'title',
        'content',
        'editor_choice',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }

    public function subCategorie()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // Relasi ke Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getThumbnailAttribute($value)
    {
        if ($value) {
            return Storage::url($value);
        } else {
            return asset('images/default-thumbnail.jpg'); // Placeholder thumbnail
        }
    }
}
