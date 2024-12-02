<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowUp extends Model
{
    use HasFactory;

    // Specify the table name (optional)
    protected $table = 'follow_ups';
    protected $fillable = ['lead_id', 'scheduled_at', 'status'];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    // Accessors (if needed)
    public function getFormattedScheduledAtAttribute()
    {
        return $this->scheduled_at->format('Y-m-d H:i:s');
    }
}
