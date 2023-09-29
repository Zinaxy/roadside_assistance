<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class vehicle extends Model
{
    use HasFactory;

    protected $table = "vehicles";
    protected $fillable =[
        'make',
        'model',
        'reg_num',
        'status',
    ];

    /**
     * Get the user that owns the vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
 /**
  * Get all of the comments for the vehicle
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */
 public function requests()
 {
     return $this->hasMany(MyRequest::class);
 }

}
