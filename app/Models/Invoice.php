<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = 'newinvoice';
    protected $fillable = ['orgid','invoiceName','product_description','status','created_by','bank_id'];
    protected $appends=['banks'];
    public function organization() 
    {
    	return $this->belongsTo('\App\Organization', 'orgid');
	}

	public function item()
	{
		return $this->hasMany('\App\Item','invoice_id');
	}

    public function createdBy() 
    {
        return $this->belongsTo('\App\User', 'created_by');
    }
    protected $casts=[
        'bank_id'=>'array'
    ];

    public function getBanksAttribute(){
        $banks=[$this->bank_id];//if bank_id is integer, convert to an array
        if(is_array($this->bank_id)){
            $banks=$this->bank_id;
        }
        return Bank::whereIn('id',$banks)->get();
    }

}
