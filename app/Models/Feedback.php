<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $fillable = [
        'user_id',
        'request_id',
        'arrival_date',
        'arrival_time',
        'status',
        'description',
    ];

    /**
     * Get the user that owns the Feedback
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the Feedback
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function request()
    {
        return $this->belongsTo(MyRequest::class, 'request_id', 'id');
    }
}
