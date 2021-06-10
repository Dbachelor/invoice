<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalDollarRate extends Model
{
    //
    protected $table='proposal_dollar_rates';

    protected $fillable=['dollar_rate', 'created_by'];
}
