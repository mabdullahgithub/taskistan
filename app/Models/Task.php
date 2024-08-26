<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'time_spent',
        'problems_faced', 'blockers', 'team_member_id'
    ];

    public function teamMember()
    {
        return $this->belongsTo(TeamMember::class);
    }
}