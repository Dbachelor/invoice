<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalSection extends Model
{
    //
    protected $table='proposal_sections';

    protected $fillable=['proposal_name', 'content', 'content_temp', 'content_complete', 'status',  'created_by', 'approved_by', 'approved_at'];

   /* protected $casts= [
    	'content_complete'=>'array',
    ];*/
}
