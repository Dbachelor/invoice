<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{   
    protected $fillable=['bank_name','account_name','account_no','currency','type','details'];
    
    public function invoices(){
        return $this->hasMany('App\Invoice');
    }


}
