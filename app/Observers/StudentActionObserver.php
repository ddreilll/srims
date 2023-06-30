<?php

namespace App\Observers;

use App\Models\StudentProfile;

class StudentActionObserver
{

    public function viewed(StudentProfile $student, $section = "Personal & Student profile")
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event(sprintf('viewed - %s', $section))
            ->useLog('activity')
            ->log(sprintf('User: %s (%s) viewed student\'s %s: %s [%s](%s)', auth()->user()->name, auth()->user()->id, $section, $student->fullName, $student->stud_studentNo, $student->stud_id));
    }

    public function stored(StudentProfile $student)
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event('created')
            ->useLog('activity')
            ->log(sprintf('User: %s (%s) created a student: %s [%s](%s)', auth()->user()->name, auth()->user()->id, $student->fullName, $student->stud_studentNo, $student->stud_id));
    }

    public function updates(StudentProfile $student)
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event('updated')
            ->useLog('activity')
            ->log(sprintf('User: %s (%s) updated a student: %s [%s](%s)', auth()->user()->name, auth()->user()->id, $student->fullName, $student->stud_studentNo, $student->stud_id));
    }

    public function archived(StudentProfile $student)
    {
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->event('archived')
            ->useLog('activity')
            ->log(sprintf('User: %s (%s) archived a student: %s [%s](%s)', auth()->user()->name, auth()->user()->id, $student->fullName, $student->stud_studentNo, $student->stud_id));
    }
}
