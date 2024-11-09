<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory, Notifiable;
    // to allow mass assignment
    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'due_date',
    ];

    // relation with User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
