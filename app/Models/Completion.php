<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;

class Completion extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    public function category()
    {
    return $this->belongsTo(Category::class);
    }
    public function posts()   
    {
    return $this->hasMany(Post::class);  
    }   

    protected $fillable = [
            'user_id',
            'title',
            'body',
            'category_id',
            'limit',
            
    
             ];
}
