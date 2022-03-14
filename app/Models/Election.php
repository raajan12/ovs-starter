<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'start',  'name'
    ];
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
