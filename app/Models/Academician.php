<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    protected $primaryKey = 'staff_number';

    protected $fillable = ['staff_number', 'name', 'email', 'college', 'department', 'position'];

    // Relationship: An academician can lead many research grants
    public function researchGrantsLed()
    {
        return $this->hasMany(ResearchGrant::class, 'project_leader_id');
    }

    // Relationship: An academician can be a member of many research grants
    public function researchGrants()
    {
        return $this->belongsToMany(ResearchGrant::class, 'project_member_research_grant', 'project_member_id', 'research_grant_id');
    }
}
