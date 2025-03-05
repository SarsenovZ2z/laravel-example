<?php

namespace App\Modules\Country\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $code
 * @property string $name
 * @property float $vat_tax
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Country extends Model
{

    protected $fillable = [
        'code', 'name', 'vat_tax',
    ];

}
