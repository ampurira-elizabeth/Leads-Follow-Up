<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Lead extends Model
{
    use HasFactory;

    // Specify the table name (optional if it follows the Laravel naming convention)
    protected $table = 'leads';

    protected $fillable = ['name', 'email', 'phone'];

    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }
}
