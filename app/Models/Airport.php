<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $code
 * @property string $name
 * @property string $timezone_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Airport extends Model
{
    use HasFactory;

    protected $table    = 'airports';
    protected $fillable = [
        'code',
        'name',
        'timezone_id',
    ];
    protected $dates    = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return HasMany
     */
    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }

    /**
     * @return BelongsTo
     */
    public function timezone(): BelongsTo
    {
        return $this->belongsTo(TimeZone::class);
    }
}
