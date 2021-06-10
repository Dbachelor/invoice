<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $table = 'purchase_items';
    protected $fillable = ['description','quantity', 'unitcost','poid','total','dtotal'];

    public function purchase()
{
	return $this->belongsTo('\App\PurchaseOrder','poid');
}
}
