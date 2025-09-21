<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Client;

class ClientPolicy
{
    public function viewAny(User $user): bool { 
        return true; 
    }
    public function view(User $user, Client $client): bool { 
        return true; 
    }
    public function create(User $user): bool { 
        return true; 
    }
    public function update(User $user, Client $client): bool { 
        return true; 
    }
    public function delete(User $user, Client $client): bool { 
        return true; 
    }
}
