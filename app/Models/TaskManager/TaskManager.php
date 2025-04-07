<?php

namespace App\Models\TaskManager;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'status', 'user_id'
    ];


    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
