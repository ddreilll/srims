<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StudentProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Observers\StudentActionObserver;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentProfile $student, Request $request)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activityLogs = $student->getActivityLogs();

        switch ($request->input('tab', 'personal')) {
            case 'personal':
                (new StudentActionObserver)->viewed($student, 'Personal & Student profile');

                return view('admin.students.show_personal', compact('student', 'activityLogs'));

                break;

            case 'documents':
                abort_if(Gate::denies('student_show_documents'), Response::HTTP_FORBIDDEN, '403 Forbidden');

                (new StudentActionObserver)->viewed($student, 'Documents');

                return view('admin.students.show_documents', compact('student', 'activityLogs'));

                break;

            case 'scholastic':

                if ($student->stud_recordType == "NONSIS") {

                    abort_if(Gate::denies('student_show_scholastic'), Response::HTTP_FORBIDDEN, '403 Forbidden');

                    (new StudentActionObserver)->viewed($student, 'Scholastic data');

                    return view('admin.students.show_scholastic', compact('student', 'activityLogs'));
                } else {
                    abort(Response::HTTP_NOT_FOUND);
                }

                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
