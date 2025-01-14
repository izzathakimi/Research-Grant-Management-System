<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'project_member_research_grant';
    protected $primaryKey = 'project_member_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Specify the fillable attributes
    protected $fillable = [
        'project_member_id',
        'research_grant_id',
    ];

    // Define the relationship with Academician
    public function academician()
    {
        return $this->belongsTo(Academician::class, 'project_member_id', 'staff_number');
    }

    // Define the relationship with ResearchGrant
    public function researchGrant()
    {
        return $this->belongsTo(ResearchGrant::class);
    }
    
}
