<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalTemplate extends Model
{
    //
    protected $table='proposal_templates';

    protected $fillable=['proposal_name', 'content', 'status',  'created_by', 'approved_by', 'approved_at'];
}
