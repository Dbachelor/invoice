<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $table = 'organs';
    protected $fillable = ['orgName','orgAddress','orgEmail','country'];


    public function Invoice() 
    {
    	return $this->hasMany('\App\Invoice', 'orgid');
	}
	public function getEmailAttribute()
	{
		return $this->orgEmail;
	}
}
