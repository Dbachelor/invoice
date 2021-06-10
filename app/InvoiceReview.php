<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceReview extends Model
{
    protected $fillable = ['invoice_id','comment','stage_id','status'];
    
}
