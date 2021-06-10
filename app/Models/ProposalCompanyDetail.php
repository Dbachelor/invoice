<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalCompanyDetail extends Model
{
    //
    protected $table='proposal_company_details';

    protected $fillable=['proposal_name', 'company_logo', 'company_name', 'executive_summary', 'created_by'];
}
