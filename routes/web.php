<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;


// Common Resource Routes:
// index - Shows all listing
// show - Show single listing
// create - Show form to create new lising
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing


Route::redirect('/', url('/login'));
Route::redirect('/home', url('/dashboard'));


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {


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

    Route::get('/dashboard', 'DashboardController@dashboard_1')->name('admin.dashboard.1');
    Route::get('ajax/student-per-year', 'DashboardController@ajax_retrieve_total_student_per_year');


    /*
    |--------------------------------------------------------------------------
    |                      Classes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('class', 'ClassController@index')->name('class');
    Route::get('gradesheet/create', 'ClassController@create');
    Route::get('class/{class}', 'ClassController@show');

    Route::get('ajax/class/retrieve-all', 'ClassController@ajax_retrieve_class_list');


    // Student Grades

    Route::get('class/{class_id}/students', 'ClassController@ajax_retrieve_all_student_grades');
    Route::post('class/update-grade', 'ClassController@ajax_edit_student_grade');
    Route::post('class/delete-grade', 'ClassController@ajax_delete_student_grade');

    Route::get('class/{class_id}/search/student-profile', 'ClassController@ajax_search_student_profile');
    Route::post('class/add-grade', 'ClassController@ajax_add_student_grade');



    /*
        |--------------------------------------------------------------------------
        |                      Student Records
        |--------------------------------------------------------------------------
        |
        */

    Route::get('student/profile', 'StudentProfileController@index')->name('student-profile');
    Route::get('student/profile/archived', 'StudentProfileController@archived');
    Route::post('student/profile/add', 'StudentProfileController@ajax_insert');
    Route::post('student/profile/retrieve', 'StudentProfileController@ajax_retrieve');
    Route::post('student/profile/edit', 'StudentProfileController@ajax_edit');
    Route::post('student/profile/update-remarks', 'StudentProfileController@ajax_update_remarks');
    Route::post('student/profile/archive', 'StudentProfileController@ajax_archive');

    Route::get('ajax/student/profile/retrieve-all', 'StudentProfileController@ajax_retrieve_student_list');
    Route::get('ajax/student/profile/retrieve-archived', 'StudentProfileController@ajax_retrieve_archived_student_list');
    Route::post('ajax/student/profile/validate-studentNo', 'StudentProfileController@ajax_validate_studentNo');
    Route::post('ajax/student/profile/restore', 'StudentProfileController@ajax_restore');

    Route::get('student/profile/add', 'StudentProfileController@create_profile');
    Route::get('student/profile/{profile_uuid}', 'StudentProfileController@show_profile');
    Route::get('student/profile/{profile_uuid}/edit', 'StudentProfileController@edit_profile');

    Route::post('student/profile/retrieve-documents', 'StudentProfileController@ajax_retrieve_documents');
    Route::post('student/profile/retrieve-prev-college', 'StudentProfileController@ajax_retrieve_prevCollege');

    Route::get('generate-pdf', 'StudentProfileController@generateTag');



    /*
|--------------------------------------------------------------------------
|                       Documents
|--------------------------------------------------------------------------
|
*/

    Route::get('documents/list', 'DocumentsController@index')->name('documents');
    Route::get('documents/retrieveAll', 'DocumentsController@ajax_retrieveAll');
    Route::post('documents/retrieve', 'DocumentsController@ajax_retrieve');
    Route::post('documents/add', 'DocumentsController@ajax_insert');
    Route::post('documents/update', 'DocumentsController@ajax_update');
    Route::post('documents/delete', 'DocumentsController@ajax_delete');

    // Documents Type
    Route::get('documents/category/{category}', 'DocumentsController@ajax_retrieve_by_category');
    Route::post('documents/document-types', 'DocumentsController@ajax_retrieveTypes');



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

    Route::post('select2/course', 'CourseController@select2');

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

    Route::post('subject/select2', 'SubjectController@ajax_select2_search');


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

    Route::post('room/select2', 'RoomController@ajax_select2_search');
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

    Route::post('instructor/select2', 'InstructorController@ajax_select2_search');



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

    Route::post('settings/semester/select2', 'TermController@ajax_select2_search');

    // School year
    Route::post('settings/school-year/select2', 'AcadYearController@ajax_select2_plus_search');
    Route::post('select2/settings/school-year/base', 'AcadYearController@ajax_select2_base_search');


    Route::get('settings/student-profile', 'SystemSettingsController@view_student_profile')->name('settings-student-profile');
    Route::post('settings/student-profile/add', 'HonorController@ajax_insert');
    Route::get('settings/student-profile/retrieveAll', 'HonorController@ajax_retrieveAll');
    Route::post('settings/student-profile/retrieve', 'HonorController@ajax_retrieve');
    Route::post('settings/student-profile/update', 'HonorController@ajax_update');
    Route::post('settings/student-profile/delete', 'HonorController@ajax_delete');
});
