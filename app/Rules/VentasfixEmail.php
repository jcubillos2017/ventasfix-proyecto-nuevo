<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class VentasfixEmail implements ValidationRule
{
    public function __construct(
        protected string $firstNameField = 'nombre',
        protected string $lastNameField  = 'apellido',
        protected string $domain         = 'ventasfix.cl',
    ) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value) || !str_contains($value, '@')) {
            $fail('El correo electrónico no es válido.');
            return;
        }

        $email = strtolower(trim($value));
        [$local, $dom] = explode('@', $email, 2);

        if ($dom !== strtolower($this->domain)) {
            $fail("El correo debe terminar en @{$this->domain}.");
            return;
        }

        // Si el Request trae nombre/apellido, exigimos formato nombre.apellido
        $req = request();
        $nombre   = $req->input($this->firstNameField);
        $apellido = $req->input($this->lastNameField);

        if ($nombre && $apellido) {
            // Normalizamos: sin acentos, minúsculas, separador "."
            $slugNombre   = Str::slug($nombre, '.');    // "Jorge Andrés" => "jorge.andres"
            $slugApellido = Str::slug($apellido, '.');  // "Del Río" => "del.rio"

            // Reemplazo defensivo de dobles puntos
            $slugNombre   = preg_replace('/\.+/', '.', $slugNombre);
            $slugApellido = preg_replace('/\.+/', '.', $slugApellido);

            $esperado = "{$slugNombre}.{$slugApellido}";

            if ($local !== $esperado) {
                $fail("El correo debe seguir el formato nombre.apellido@{$this->domain} (ej: {$esperado}@{$this->domain}).");
                return;
            }
        }
        // Si no hay nombre/apellido en el request, solo validamos dominio.
    }
}
