<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditedActivity extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
    ];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
