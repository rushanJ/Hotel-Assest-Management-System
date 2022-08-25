<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'email','address','contactNo'];

    //
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
