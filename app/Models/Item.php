<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'items';
    protected $fillable = ['productName','description','quantity', 'unitcost','discount','total','dtotal','subtotal','servicetotal','vattotal','gtotal','invoice_id','currency','rate'];

    public function invoice()
{
	return $this->belongsTo('\App\Invoice','invoice_id');
}
}

