<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyRequest extends Model
{
    use HasFactory;

    protected $table = 'my_requests';
    protected $fillable = [
        'vehicle_id',
        'ass_type',
        'province',
        'place',
        'latitude',
        'longitude',
        'status',
        'description',
    ];

    /**
     * Get the user associated with the MyRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }

    /**
     * Get the user that owns the MyRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     /**
  * Get the user associated with the vehicle
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasOne
  */
 public function feedback(): HasOne
 {
     return $this->hasOne(Feedback::class);
 }
}
