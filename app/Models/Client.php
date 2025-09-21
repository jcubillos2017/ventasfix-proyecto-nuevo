<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'rut_empresa',
        'rubro',
        'razon_social',
        'telefono',
        'direccion',
        'contacto_nombre',
        'contacto_email',
    ];

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'client_id');
    }

    public function setRutEmpresaAttribute($value)
    {
        $val = strtoupper(trim((string) $value));
        // quita puntos
        $val = str_replace('.', '', $val);
        // reemplaza guiones múltiples / espacios
        $val = preg_replace('/\s+/', '', $val);
        // si viene sin guion, lo intentamos insertar antes del DV (último carácter)
        if (strpos($val, '-') === false && strlen($val) > 1) {
            $val = substr($val, 0, -1) . '-' . substr($val, -1);
        }
        $this->attributes['rut_empresa'] = $val;
    }
}
