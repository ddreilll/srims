<?php

namespace App\Observers;

use App\Models\StudentProfile;

class StudentActionObserver
{

    public function viewed(StudentProfile $student)
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event('viewed')
            ->log(sprintf('User: %s (%s) viewed: %s (%s)', auth()->user()->name, auth()->user()->id, $student->fullName, $student->stud_id));
    }

    public function stored(StudentProfile $student)
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event('created')
            ->log(sprintf('User: %s (%s) created: %s (%s)', auth()->user()->name, auth()->user()->id, $student->fullName, $student->stud_id));
    }

    public function updates(StudentProfile $student)
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event('updated')
            ->log(sprintf('User: %s (%s) updated: %s (%s)', auth()->user()->name, auth()->user()->id, $student->fullName, $student->stud_id));
    }

    public function archived(StudentProfile $student)
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event('archived')
            ->log(sprintf('User: %s (%s) archived: %s (%s)', auth()->user()->name, auth()->user()->id, $student->fullName, $student->stud_id));
    }
}
