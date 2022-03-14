<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'position_id', 'media_id', 'election_id', 'description'
    ];
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
