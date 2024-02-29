<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistoryAssignment extends Model
{
    use HasFactory;

    protected $fillable = [];

    /**
     * Get the user that owns the UserHistoryAssignment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the userHistory that owns the UserHistoryAssignment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userHistory()
    {
        return $this->belongsTo(UserHistory::class);
    }
}
