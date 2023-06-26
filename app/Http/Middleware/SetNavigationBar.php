<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;

class SetNavigationBar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request);
        }

        $navigation = [
            [
                "title" => "Dashboard",
                "url" => route('home'),
                "active" => request()->routeIs('home'),
                "icon_class" => "fa-light fa-chart-mixed",
                "children" => []
            ]
        ];

        // Students
        if (Gate::check(['student_access'])) {

            array_push($navigation, [
                "title" => trans('cruds.student.title'),
                "active" => (request()->is('students*')),
                "url" => route("students.index"),
                "icon_class" => "fa-light fa-screen-users",
                "children" => []
            ]);
        }

        // Gradesheets
        if (Gate::check(['gradesheet_access'])) {

            array_push($navigation, [
                "title" => trans('cruds.gradesheet.title'),
                "active" => (request()->is('gradesheets*')),
                "url" => "",
                "icon_class" => "fa-light fa-memo-pad",
                "children" => []
            ]);
        }

        // System Tools & Maintenance
        if (Gate::check('course_access') || Gate::check('document_access') || Gate::check('instructor_access') || Gate::check('room_access') || Gate::check('subject_access') || Gate::check('school_year_access') || Gate::check('semester_access')) {

            $systemSetups = [
                "title" => "System Setups",
                "url" => "#",
                "icon_class" => "fa-light fa-sliders",
                "children" => []
            ];

            if (Gate::check(['course_access'])) {

                array_push($systemSetups['children'], [
                    "title" => trans('cruds.course.title'),
                    "url" => route('courses.index'),
                    "children" => []
                ]);
            }

            if (Gate::check(['document_access'])) {

                array_push($systemSetups['children'], [
                    "title" => trans('cruds.document.title'),
                    "url" => "#",
                    "children" => []
                ]);
            }

            if (Gate::check(['student_honor_access'])) {

                $students = [
                    "title" => trans('cruds.student.title'),
                    "url" => "#",
                    "children" => []
                ];

                if (Gate::check(['student_honor_access'])) {

                    array_push($students['children'], [
                        "title" => trans('cruds.studentHonor.title'),
                        "url" => "#",
                        "children" => []
                    ]);
                }

                array_push($systemSetups['children'], $students);
            }

            if (Gate::check(['instructor_access']) || Gate::check(['room_access']) || Gate::check(['subject_access'])) {

                $gradesheetSetup = [
                    "title" => trans('cruds.gradesheet.title'),
                    "url" => "#",
                    "icon_class" => "fa-light fa-screwdriver-wrench",
                    "children" => []
                ];

                if (Gate::check(['instructor_access'])) {

                    array_push($gradesheetSetup['children'], [
                        "title" => trans('cruds.instructor.title'),
                        "url" => route('instructors.index'),
                        "children" => []
                    ]);
                }

                if (Gate::check(['room_access'])) {

                    array_push($gradesheetSetup['children'], [
                        "title" => trans('cruds.room.title'),
                        "url" => route('rooms.index'),
                        "children" => []
                    ]);
                }

                if (Gate::check(['subject_access'])) {

                    array_push($gradesheetSetup['children'], [
                        "title" => trans('cruds.subject.title'),
                        "url" => route('subjects.index'),
                        "children" => []
                    ]);
                }

                array_push($systemSetups['children'], $gradesheetSetup);
            }

            if (Gate::check(['school_year_access']) || Gate::check(['semester_access'])) {

                $misc = [
                    "title" => __('Misc'),
                    "url" => "#",
                    "icon_class" => "fa-light fa-screwdriver-wrench",
                    "children" => []
                ];

                if (Gate::check(['school_year_access'])) {

                    array_push($misc['children'], [
                        "title" => trans('cruds.schoolYear.title'),
                        "url" => "#",
                        "children" => []
                    ]);
                }

                if (Gate::check(['semester_access'])) {

                    array_push($misc['children'], [
                        "title" => trans('cruds.semester.title'),
                        "url" => "#",
                        "children" => []
                    ]);
                }

                array_push($systemSetups['children'], $misc);
            }

            array_push($navigation, $systemSetups);
        }

        // User & Access Management
        if (Gate::check('role_access') || Gate::check('role_access')) {

            $userAccessManagement = [
                "title" => "User & Access Management",
                "url" => "#",
                "icon_class" => "fa-light fa-user-unlock",
                "children" => []
            ];

            // Roles
            if (Gate::check('role_access')) {
                array_push($userAccessManagement['children'], [
                    "title" => trans('cruds.role.title'),
                    "active" => (request()->is('roles*')),
                    "url" => route('roles.index'),
                    "children" => []
                ]);
            }

            // Users
            if (Gate::check('user_access')) {
                array_push($userAccessManagement['children'], [
                    "title" => trans('cruds.user.title'),
                    "active" => (request()->is('users*')),
                    "url" => route('users.index'),
                    "children" => []
                ]);
            }

            array_push($navigation, $userAccessManagement);
        }

        // System Tools and Maintenance
        // if (Gate::check(['audit_log_access', 'user_alert_access'])) {

        //     $systemSetups = [
        //         "title" => "System Tools & Maintenance",
        //         "url" => "#",
        //         "icon_class" => "fa-light fa-screwdriver-wrench",
        //         "children" => []
        //     ];

        //     // Audit Logs
        //     if (Gate::check('audit_log_access')) {
        //         array_push($systemSetups['children'], [
        //             "title" => trans('cruds.auditLog.title'),
        //             "active" => (request()->is('audit-logs*')),
        //             "url" => route('audit-logs.index'),
        //             "children" => []
        //         ]);
        //     }

        //     // User Alerts
        //     if (Gate::check('user_alert_access')) {
        //         array_push($systemSetups['children'], [
        //             "title" => trans('cruds.userAlert.title'),
        //             "active" => (request()->is('user-alerts*')),
        //             "url" => route('user-alerts.index'),
        //             "children" => []
        //         ]);
        //     }

        //     array_push($navigation, $systemSetups);
        // }

        View::share('navigation', $navigation);

        return $next($request);
    }
}
