<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RutChileno implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $rut = strtoupper(preg_replace('/[^0-9Kk]/', '', (string)$value));
        if (strlen($rut) < 2) {
            $fail('El :attribute no es válido.');
            return;
        }

        $dv   = substr($rut, -1);
        $cuerpo = substr($rut, 0, -1);

        // Cálculo DV (módulo 11)
        $suma = 0; $multiplo = 2;
        for ($i = strlen($cuerpo) - 1; $i >= 0; $i--) {
            $suma += intval($cuerpo[$i]) * $multiplo;
            $multiplo = $multiplo == 7 ? 2 : $multiplo + 1;
        }
        $resto = 11 - ($suma % 11);
        $dvCalc = match($resto) {
            11 => '0',
            10 => 'K',
            default => (string)$resto,
        };

        if ($dvCalc !== strtoupper($dv)) {
            $fail('El :attribute tiene dígito verificador incorrecto.');
        }
    }
}
