<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool { return true; }
    public function view(User $user, User $model): bool { return true; }

    public function create(User $user): bool { return true; }
    public function update(User $user, User $model): bool { return true; }

    // evita que un usuario se borre a sí mismo desde policy si quieres
    public function delete(User $user, User $model): bool
    {
        return $user->id !== $model->id;
    }
}
