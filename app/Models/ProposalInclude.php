<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalInclude extends Model
{
    //
    protected $table='proposal_includes';

    protected $fillable=['proposal_name', 'section', 'title', 'answer', 'monthly_rate', 'created_by'];
}
