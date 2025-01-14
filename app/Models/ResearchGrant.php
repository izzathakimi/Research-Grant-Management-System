<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchGrant extends Model
{
    protected $fillable = [
        'grant_amount',
        'grant_provider',
        'project_title',
        'start_date',
        'duration',
        'project_leader_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
    ];

    // Relationship: A research grant is led by one project leader
    public function projectLeader()
    {
        return $this->belongsTo(Academician::class, 'project_leader_id', 'staff_number');
    }

    // Relationship: A research grant can have many project members
    public function projectMembers()
    {
        return $this->hasMany(ProjectMember::class, 'research_grant_id', 'id');
    }

    public function milestones()
    {
        return $this->hasMany(ProjectMilestone::class, 'research_grant_id');
    }
}
