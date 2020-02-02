<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'descripcion', 'valor', 'stop', 'stop_min', 'stop_max', 
    ];

    public function tipo_id()
    {
        return $this->hasOne('App\TipoMedicamentos');
    }
}
