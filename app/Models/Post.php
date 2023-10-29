<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Completion;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'limit',
        'is_done',
        'finished_at',
        
    ];
    protected $casts = [
        'is_done'=>'boolean'
    ];      
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function canCreate()
    {
        $diff = Carbon::now()->diffInHours($this->created_at);
        if($diff > 24)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
     
}
