<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Completion;

class Post extends Model
{
    use SoftDeletes;
    
    public function category()
    {
    return $this->belongsTo(Category::class);
    }
    public function completions()   
    {
    return $this->hasMany(Completion::class);  
    }
    public function getPaginateByLimit(int $limit_count = 10)
    {
    
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
        protected $fillable = [
            'title',
            'body',
            'category_id',
            'limit',
            'user_id', 
            ];
    }
