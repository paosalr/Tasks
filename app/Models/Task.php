<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'state_id'];
    public $timestamps = false;
    public function stateType()
    {
        return $this->belongsTo(StateType::class, 'state_id');
    }
}
