<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $with = ['edited'];

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function edited() {
        return $this->hasOne(EditedActivity::class);
    }
}
