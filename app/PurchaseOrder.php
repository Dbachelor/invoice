<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';
    protected $fillable = ['orgid','name','status'];

    public function organization() 
    {
    	return $this->belongsTo('\App\Organization', 'orgid');
    }
    public function purchase()
    {
        return $this->hasMany('\App\PurchaseItem','poid');
    }
}
