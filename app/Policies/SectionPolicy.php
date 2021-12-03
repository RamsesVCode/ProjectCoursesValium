<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;


    public function owner(User $user, Section $section)
    {
        if($user->sections->contains($section)){
            return true;
        }
        return false;
    }
    
}
