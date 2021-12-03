<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;
    public function enrolled(User $user,Course $course){
        return $course->students->contains($user->id);
        // return $course->students->contains($user->id)
        //         ? Response::allow()
        //         : Response::deny('No tienes acceso a este curso');
    }
    public function dictated(User $user,Course $course){
        if($course->teacher->id == $user->id){
            return true;
        }
        return false;
    }
}
