<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Completion extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    protected $fillable = [
            'title',
            'body',
            'category_id',
            'limit' ];
}
