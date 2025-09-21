<?php

namespace App\Policies;

use App\Models\{User, Cart};

class CartPolicy
{
    public function update(User $user, Cart $cart): bool
    {
        return $user->id === $cart->user_id;
    }
}
