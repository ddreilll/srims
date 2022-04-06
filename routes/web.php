<?php

Route::redirect('/', url('/login'));
Route::redirect('/home', url('/admin'));


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {


    /*
|--------------------------------------------------------------------------
|                      Student Grades
|--------------------------------------------------------------------------
|
*/

    Route::get('student/grades', 'StudentGradesController@index')->name('student-grades');
    Route::post('student/grades/add', 'StudentGradesController@ajax_insert');
    Route::get('student/grades/retrieveAll', 'StudentGradesController@ajax_retrieveAll');
    Route::post('student/grades/retrieve', 'StudentGradesController@ajax_retrieve');
    Route::post('student/grades/update', 'StudentGradesController@ajax_update');
    Route::post('student/grades/delete', 'StudentGradesController@ajax_delete');

    /*
|--------------------------------------------------------------------------
|                      Student Records
|--------------------------------------------------------------------------
|
*/

    Route::get('student/profile', 'StudentProfileController@index')->name('student-profile');
    Route::post('student/profile/add', 'StudentProfileController@ajax_insert');
    Route::get('student/profile/retrieveAll', 'StudentProfileController@ajax_retrieveAll');
    Route::post('student/profile/retrieve', 'StudentProfileController@ajax_retrieve');
    Route::post('student/profile/update', 'StudentProfileController@ajax_update');
    Route::post('student/profile/delete', 'StudentProfileController@ajax_delete');

    Route::get('student/profile/{profile_uuid}', 'StudentProfileController@view_profile');




    /*
|--------------------------------------------------------------------------
|                       Admission Requirements
|--------------------------------------------------------------------------
|
*/

    Route::get('admission-requirements/list', 'AdmissionRequirementsController@index')->name('admission-requirements');
    Route::get('admission-requirements/retrieveAll', 'AdmissionRequirementsController@ajax_retrieveAll');
    Route::post('admission-requirements/retrieve', 'AdmissionRequirementsController@ajax_retrieve');
    Route::post('admission-requirements/add', 'AdmissionRequirementsController@ajax_insert');
    Route::post('admission-requirements/update', 'AdmissionRequirementsController@ajax_update');
    Route::post('admission-requirements/delete', 'AdmissionRequirementsController@ajax_delete');


    /*
|--------------------------------------------------------------------------
|                       Admission Criteria
|--------------------------------------------------------------------------
|
*/

    Route::get('admission-criteria/list', 'AdmissionCriteriaController@index')->name('admission-criteria');
    Route::get('admission-criteria/retrieveAll', 'AdmissionCriteriaController@ajax_retrieveAll');
    Route::post('admission-criteria/add', 'AdmissionCriteriaController@ajax_insert');
    Route::post('admission-criteria/retrieve', 'AdmissionCriteriaController@ajax_retrieve');
    Route::post('admission-criteria/update', 'AdmissionCriteriaController@ajax_update');
    Route::post('admission-criteria/delete', 'AdmissionCriteriaController@ajax_delete');

    /*
|--------------------------------------------------------------------------
|                       Curriculum
|--------------------------------------------------------------------------
|
*/
    Route::get('curriculum', 'CurriculumController@index')->name('curriculum');



    /*
|--------------------------------------------------------------------------
|                       Course
|--------------------------------------------------------------------------
|
*/

    Route::get('course', 'CourseController@index')->name('course');
    Route::post('course/add', 'CourseController@ajax_insert');
    Route::get('course/retrieveAll', 'CourseController@ajax_retrieveAll');
    Route::post('course/retrieve', 'CourseController@ajax_retrieve');
    Route::post('course/update', 'CourseController@ajax_update');
    Route::post('course/delete', 'CourseController@ajax_delete');

    /*
|--------------------------------------------------------------------------
|                       Subject
|--------------------------------------------------------------------------
|
*/

    Route::get('subject', 'SubjectController@index')->name('subject');
    Route::post('subject/add', 'SubjectController@ajax_insert');
    Route::get('subject/retrieveAll', 'SubjectController@ajax_retrieveAll');
    Route::post('subject/retrieve', 'SubjectController@ajax_retrieve');
    Route::post('subject/update', 'SubjectController@ajax_update');
    Route::post('subject/delete', 'SubjectController@ajax_delete');
    Route::post('subject/checkDelete', 'SubjectController@ajax_checkDelete');


    /*
|--------------------------------------------------------------------------
|                       Schedule Setup
|--------------------------------------------------------------------------
|
*/

    Route::get('schedules', 'ScheduleController@index')->name('schedules');
    Route::post('schedules/add', 'ScheduleController@ajax_insert');
    Route::get('schedules/retrieveAll', 'ScheduleController@ajax_retrieveAll');
    Route::post('schedules/validate', 'ScheduleController@ajax_validate');
    Route::post('schedules/retrieve', 'ScheduleController@ajax_retrieve');
    Route::post('schedules/update', 'ScheduleController@ajax_update');
    Route::post('schedules/delete', 'ScheduleController@ajax_delete');


    /*
|--------------------------------------------------------------------------
|                       Room Setup
|--------------------------------------------------------------------------
|
*/

    Route::get('room', 'RoomController@index')->name('room');
    Route::post('room/add', 'RoomController@ajax_insert');
    Route::get('room/retrieveAll', 'RoomController@ajax_retrieveAll');
    Route::post('room/retrieve', 'RoomController@ajax_retrieve');
    Route::post('room/update', 'RoomController@ajax_update');
    Route::post('room/delete', 'RoomController@ajax_delete');


    /*
|--------------------------------------------------------------------------
|                       Instructor Setup
|--------------------------------------------------------------------------
|
*/

    Route::get('instructor', 'InstructorController@index')->name('instructor');
    Route::post('instructor/add', 'InstructorController@ajax_insert');
    Route::get('instructor/retrieveAll', 'InstructorController@ajax_retrieveAll');
    Route::post('instructor/retrieve', 'InstructorController@ajax_retrieve');
    Route::post('instructor/update', 'InstructorController@ajax_update');
    Route::post('instructor/delete', 'InstructorController@ajax_delete');




    /*
|--------------------------------------------------------------------------
|                       System Settings
|--------------------------------------------------------------------------
|
*/

    Route::get('settings/curriculum', 'SystemSettingsController@view_curriculum')->name('settings-student-profile');

    // Year Level
    Route::post('settings/year-level/add', 'YearLevelController@ajax_insert');
    Route::get('settings/year-level/retrieveAll', 'YearLevelController@ajax_retrieveAll');
    Route::post('settings/year-level/retrieve', 'YearLevelController@ajax_retrieve');
    Route::post('settings/year-level/updateOrder', 'YearLevelController@ajax_reorder');
    Route::post('settings/year-level/update', 'YearLevelController@ajax_update');
    Route::post('settings/year-level/delete', 'YearLevelController@ajax_delete');

    // Term
    Route::post('settings/term/add', 'TermController@ajax_insert');
    Route::get('settings/term/retrieveAll', 'TermController@ajax_retrieveAll');
    Route::post('settings/term/retrieve', 'TermController@ajax_retrieve');
    Route::post('settings/term/updateOrder', 'TermController@ajax_reorder');
    Route::post('settings/term/update', 'TermController@ajax_update');
    Route::post('settings/term/delete', 'TermController@ajax_delete');


    Route::get('settings/student-profile', 'SystemSettingsController@view_student_profile')->name('settings-student-profile');
    Route::post('settings/student-profile/add', 'HonorController@ajax_insert');
    Route::get('settings/student-profile/retrieveAll', 'HonorController@ajax_retrieveAll');
    Route::post('settings/student-profile/retrieve', 'HonorController@ajax_retrieve');
    Route::post('settings/student-profile/update', 'HonorController@ajax_update');
    Route::post('settings/student-profile/delete', 'HonorController@ajax_delete');
});
