<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function shipment(){
        return $this->hasOne(Shipment::class);
    }
}
