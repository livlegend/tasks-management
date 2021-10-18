<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory; use SoftDeletes;
    
    protected static function boot(){
        parent::boot();
        
        //order by priority always

        static::addGlobalScope('order',function(Builder $builder){
            $builder->orderBy('priority','ASC');
        });
    }
 
    
    protected $fillable = ['name', 'priority', 'task_time', 'project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
