<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
     {
       return $this->belongsTo(Category::class);
    }
 

    public function status()
    {
      return $this->belongsTo(Status::class);
   }


    public function getStatusClasses()
    {
           $allStatuses = [
               'Open' => 'bg-gray text-white',
               'Considering' => 'bg-purple text-white',
               'In Progress' => 'bg-yellow text-white',
               'Implemented' => 'bg-green text-white',
               'CLosed' => 'bg-red text-white',
           ];

           return $allStatuses[$this->status->name];
        
    }
    
}
