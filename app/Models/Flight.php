<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $flight_number
 * @property string $departure_airport_id
 * @property string $arrival_airport_id
 * @property string $departure_date_time
 * @property string $arrival_date_time
 * @property string $duration
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 *
 * @property-read Airport $departureAirport
 * @property-read Airport $arrivalAirport
 */
class Flight extends Model
{
    use HasFactory;

    protected $table    = 'flights';
    protected $fillable = [
        'flight_number',
        'departure_date_time',
        'arrival_date_time',
        'duration',
    ];
    protected $dates    = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    /**
     * @return BelongsTo
     */
    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    /**
     * @return BelongsTo
     */
    public function transporter(): BelongsTo
    {
        return $this->belongsTo(Transporter::class);
    }
}
