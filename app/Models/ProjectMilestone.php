<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMilestone extends Model
{
    protected $fillable = [
        'research_grant_id',
        'name',
        'target_completion_date',
        'deliverable',
        'status',
        'remark',
        'date_updated',
    ];

    // Relationship: A project milestone belongs to a research grant
    public function researchGrant()
    {
        return $this->belongsTo(ResearchGrant::class);
    }
}
