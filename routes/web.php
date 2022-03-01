<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
|                      Student Grades
|--------------------------------------------------------------------------
|
*/

Route::get('student/grades', 'Admin\StudentGradesController@index')->name('student-grades');
Route::post('student/grades/add', 'Admin\StudentGradesController@ajax_insert');
Route::get('student/grades/retrieveAll', 'Admin\StudentGradesController@ajax_retrieveAll');
Route::post('student/grades/retrieve', 'Admin\StudentGradesController@ajax_retrieve');
Route::post('student/grades/update', 'Admin\StudentGradesController@ajax_update');
Route::post('student/grades/delete', 'Admin\StudentGradesController@ajax_delete');

/*
|--------------------------------------------------------------------------
|                      Student Records
|--------------------------------------------------------------------------
|
*/

Route::get('student/profile', 'Admin\StudentProfileController@index')->name('student-profile');
Route::post('student/profile/add', 'Admin\StudentProfileController@ajax_insert');
Route::get('student/profile/retrieveAll', 'Admin\StudentProfileController@ajax_retrieveAll');
Route::post('student/profile/retrieve', 'Admin\StudentProfileController@ajax_retrieve');
Route::post('student/profile/update', 'Admin\StudentProfileController@ajax_update');
Route::post('student/profile/delete', 'Admin\StudentProfileController@ajax_delete');

Route::get('student/profile/{profile_uuid}', 'Admin\StudentProfileController@view_profile');




/*
|--------------------------------------------------------------------------
|                       Admission Requirements
|--------------------------------------------------------------------------
|
*/

Route::get('admission-requirements/list', 'Admin\AdmissionRequirementsController@index')->name('admission-requirements');
Route::get('admission-requirements/retrieveAll', 'Admin\AdmissionRequirementsController@ajax_retrieveAll');
Route::post('admission-requirements/retrieve', 'Admin\AdmissionRequirementsController@ajax_retrieve');
Route::post('admission-requirements/add', 'Admin\AdmissionRequirementsController@ajax_insert');
Route::post('admission-requirements/update', 'Admin\AdmissionRequirementsController@ajax_update');
Route::post('admission-requirements/delete', 'Admin\AdmissionRequirementsController@ajax_delete');


/*
|--------------------------------------------------------------------------
|                       Admission Criteria
|--------------------------------------------------------------------------
|
*/

Route::get('admission-criteria/list', 'Admin\AdmissionCriteriaController@index')->name('admission-criteria');
Route::get('admission-criteria/retrieveAll', 'Admin\AdmissionCriteriaController@ajax_retrieveAll');
Route::post('admission-criteria/add', 'Admin\AdmissionCriteriaController@ajax_insert');
Route::post('admission-criteria/retrieve', 'Admin\AdmissionCriteriaController@ajax_retrieve');
Route::post('admission-criteria/update', 'Admin\AdmissionCriteriaController@ajax_update');
Route::post('admission-criteria/delete', 'Admin\AdmissionCriteriaController@ajax_delete');

/*
|--------------------------------------------------------------------------
|                       Curriculum
|--------------------------------------------------------------------------
|
*/
Route::get('curriculum', 'Admin\CurriculumController@index')->name('curriculum');



/*
|--------------------------------------------------------------------------
|                       Course
|--------------------------------------------------------------------------
|
*/

Route::get('course', 'Admin\CourseController@index')->name('course');
Route::post('course/add', 'Admin\CourseController@ajax_insert');
Route::get('course/retrieveAll', 'Admin\CourseController@ajax_retrieveAll');
Route::post('course/retrieve', 'Admin\CourseController@ajax_retrieve');
Route::post('course/update', 'Admin\CourseController@ajax_update');
Route::post('course/delete', 'Admin\CourseController@ajax_delete');

/*
|--------------------------------------------------------------------------
|                       Subject
|--------------------------------------------------------------------------
|
*/

Route::get('subject', 'Admin\SubjectController@index')->name('subject');
Route::post('subject/add', 'Admin\SubjectController@ajax_insert');
Route::get('subject/retrieveAll', 'Admin\SubjectController@ajax_retrieveAll');
Route::post('subject/retrieve', 'Admin\SubjectController@ajax_retrieve');
Route::post('subject/update', 'Admin\SubjectController@ajax_update');
Route::post('subject/delete', 'Admin\SubjectController@ajax_delete');
Route::post('subject/checkDelete', 'Admin\SubjectController@ajax_checkDelete');


/*
|--------------------------------------------------------------------------
|                       Schedule Setup
|--------------------------------------------------------------------------
|
*/

Route::get('schedules', 'Admin\ScheduleController@index')->name('schedules');
Route::post('schedules/add', 'Admin\ScheduleController@ajax_insert');
Route::get('schedules/retrieveAll', 'Admin\ScheduleController@ajax_retrieveAll');
Route::post('schedules/validate', 'Admin\ScheduleController@ajax_validate');
Route::post('schedules/retrieve', 'Admin\ScheduleController@ajax_retrieve');
Route::post('schedules/update', 'Admin\ScheduleController@ajax_update');
Route::post('schedules/delete', 'Admin\ScheduleController@ajax_delete');


/*
|--------------------------------------------------------------------------
|                       Room Setup
|--------------------------------------------------------------------------
|
*/

Route::get('room', 'Admin\RoomController@index')->name('room');
Route::post('room/add', 'Admin\RoomController@ajax_insert');
Route::get('room/retrieveAll', 'Admin\RoomController@ajax_retrieveAll');
Route::post('room/retrieve', 'Admin\RoomController@ajax_retrieve');
Route::post('room/update', 'Admin\RoomController@ajax_update');
Route::post('room/delete', 'Admin\RoomController@ajax_delete');


/*
|--------------------------------------------------------------------------
|                       Instructor Setup
|--------------------------------------------------------------------------
|
*/

Route::get('instructor', 'Admin\InstructorController@index')->name('instructor');
Route::post('instructor/add', 'Admin\InstructorController@ajax_insert');
Route::get('instructor/retrieveAll', 'Admin\InstructorController@ajax_retrieveAll');
Route::post('instructor/retrieve', 'Admin\InstructorController@ajax_retrieve');
Route::post('instructor/update', 'Admin\InstructorController@ajax_update');
Route::post('instructor/delete', 'Admin\InstructorController@ajax_delete');



/*
|--------------------------------------------------------------------------
|                       System Settings
|--------------------------------------------------------------------------
|
*/

Route::get('settings/curriculum', 'Admin\SystemSettingsController@view_curriculum')->name('settings-student-profile');

// Year Level
Route::post('settings/year-level/add', 'Admin\YearLevelController@ajax_insert');
Route::get('settings/year-level/retrieveAll', 'Admin\YearLevelController@ajax_retrieveAll');
Route::post('settings/year-level/retrieve', 'Admin\YearLevelController@ajax_retrieve');
Route::post('settings/year-level/updateOrder', 'Admin\YearLevelController@ajax_reorder');
Route::post('settings/year-level/update', 'Admin\YearLevelController@ajax_update');
Route::post('settings/year-level/delete', 'Admin\YearLevelController@ajax_delete');

// Term
Route::post('settings/term/add', 'Admin\TermController@ajax_insert');
Route::get('settings/term/retrieveAll', 'Admin\TermController@ajax_retrieveAll');
Route::post('settings/term/retrieve', 'Admin\TermController@ajax_retrieve');
Route::post('settings/term/updateOrder', 'Admin\TermController@ajax_reorder');
Route::post('settings/term/update', 'Admin\TermController@ajax_update');
Route::post('settings/term/delete', 'Admin\TermController@ajax_delete');


Route::get('settings/student-profile', 'Admin\SystemSettingsController@view_student_profile')->name('settings-student-profile');
Route::post('settings/student-profile/add', 'Admin\HonorController@ajax_insert');
Route::get('settings/student-profile/retrieveAll', 'Admin\HonorController@ajax_retrieveAll');
Route::post('settings/student-profile/retrieve', 'Admin\HonorController@ajax_retrieve');
Route::post('settings/student-profile/update', 'Admin\HonorController@ajax_update');
Route::post('settings/student-profile/delete', 'Admin\HonorController@ajax_delete');


