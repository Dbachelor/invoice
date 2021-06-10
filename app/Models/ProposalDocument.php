<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalDocument extends Model
{
    //
    protected $table='proposal_documents';

    protected $fillable=['document_type', 'document_name', 'document_file', 'created_by'];
}
