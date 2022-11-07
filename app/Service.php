<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = ['item_id','comment','type'];
    
    public function serviceBy()
    {
        return $this->belongsTo(Service::class, 'item_id')->withTrashed();
    } 

    // public function cleansBy()
    // {
    //     return $this->belongsToMany(Service::class, 'services');
    // }
}
