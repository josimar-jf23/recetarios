<?php

namespace App\Policies;

use App\Models\Receta;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecetaPolicy
{
    
    use HandlesAuthorization;

    public function creator(User $user,Receta $receta)
    {
        if($user->id == $receta->user_id){
            return true;
        }
        return false;
    }
}
