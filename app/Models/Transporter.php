<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $code
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Transporter extends Model
{
    use HasFactory;

    protected $table    = 'transporters';
    protected $fillable = [
        'code',
        'name',
    ];
    protected $dates    = [
        'created_at',
        'updated_at',
    ];
}
