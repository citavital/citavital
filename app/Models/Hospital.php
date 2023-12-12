<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hospital
 * @property $id
 * @property $nombre
 * @property $latitud
 * @property $longitud
 * @property $telefono_1
 * @property $telefono_2
 * @property $url
 * @since 1.0
 * @package App\Models
 */
class Hospital extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = 'hospitales';

    protected $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'telefono_1',
        'telefono_2',
        'url'
    ];
}
