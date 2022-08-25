<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['name', 'description','model','brand','roomId','supplierId','serialNo'];

    //
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
