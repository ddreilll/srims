<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

    // User Accounts
    Route::resource('users', 'UsersController');



    Route::get('/dashboard', 'DashboardController@dashboard_1')->name('admin.dashboard.1');
    Route::get('ajax/student-per-year', 'DashboardController@ajax_retrieve_total_student_per_year');


    /*
    |--------------------------------------------------------------------------
    |                      Gradesheet
    |--------------------------------------------------------------------------
    |
    */
    Route::get('gradesheet', 'GradesheetController@index')->name('admin.gradesheet');
    Route::get('gradesheet/create', 'GradesheetController@create')->name('admin.gradesheet.create');;
    Route::get('gradesheet/{gradesheet}', 'GradesheetController@show')->whereNumber('gradesheet')->name('admin.gradesheet.show');
    Route::post('gradesheet/{gradesheet}/validate/student-enrollment', 'GradesheetController@validateStudentEnrollment')->name('admin.gradesheet.validate.student-enrollment');
    Route::post('gradesheet/{gradesheet}/form-validate/student', 'GradesheetController@validateStudent')->name('admin.gradesheet.form-validate.student');
    Route::get('gradesheet/{gradesheet}/pages', 'GradesheetController@getPages')->name('admin.gradesheet.pages');
    Route::get('gradesheet/{gradesheet}/page-rows', 'GradesheetController@getPageRows')->name('admin.gradesheet.page.rows');
    Route::post('gradesheet/{gradesheet}/page-details', 'GradesheetController@getPageDetails')->name('admin.gradesheet.pages-details');

    Route::post('gradesheet/store', 'GradesheetController@store');
    Route::get('gradesheet/{gradesheet}/edit', 'GradesheetController@edit')->name('admin.gradesheet.edit');
    Route::post('gradesheet/{gradesheet}', 'GradesheetController@save')->name('admin.gradesheet.update');

    Route::post('gradesheet/{gradesheet}/students', 'GradesheetController@storeStudents')->name('admin.gradesheet-students.store');
    Route::get('gradesheet/{gradesheet}/students/{student}', 'GradesheetController@showStudent')->name('admin.gradesheet-students.show');
    Route::post('gradesheet/{gradesheet}/students/{student}', 'GradesheetController@updateStudent')->name('admin.gradesheet-students.update');
    Route::delete('gradesheet/{gradesheet}/students/{student}', 'GradesheetController@destroyStudent')->name('admin.gradesheet-students.destroy');

    Route::get('gradesheet/{gradesheet}/generate/pdf', 'GradesheetController@generatePdf')->name('admin.gradesheet.generate.pdf');

    /*
    |--------------------------------------------------------------------------
    |                      Student Records
    |--------------------------------------------------------------------------
    |
    */


    Route::get('student/profile', 'StudentProfileController@index')->name('student-profile');
    Route::get('student/profile/archived', 'StudentProfileController@archived');
    Route::post('student/profile/add', 'StudentProfileController@ajax_insert');
    Route::post('student/profile/retrieve', 'StudentProfileController@ajax_retrieve')->name('admin.student.ajaxRetrieve');
    Route::post('student/profile/edit', 'StudentProfileController@ajax_edit');
    Route::post('student/profile/update-remarks', 'StudentProfileController@ajax_update_remarks');
    Route::post('student/profile/archive', 'StudentProfileController@ajax_archive');

    Route::get('ajax/student/profile/retrieve-all', 'StudentProfileController@ajax_retrieve_student_list')->name('admin.student.fetch');
    Route::get('ajax/student/profile/retrieve-archived', 'StudentProfileController@ajax_retrieve_archived_student_list');
    Route::post('ajax/student/profile/validate-studentNo', 'StudentProfileController@ajax_validate_studentNo');
    Route::post('ajax/student/profile/restore', 'StudentProfileController@ajax_restore');

    Route::get('student/profile/add', 'StudentProfileController@create_profile')->name('admin.student.create');
    Route::get('student/profile/{profile_uuid}', 'StudentProfileController@show_profile');
    Route::get('student/profile/{profile_uuid}/edit', 'StudentProfileController@edit_profile');

    Route::post('student/profile/retrieve-documents', 'StudentProfileController@ajax_retrieve_documents');
    Route::post('student/profile/retrieve-prev-college', 'StudentProfileController@ajax_retrieve_prevCollege');

    Route::get('students/{student}/generate/envelope-document-evaluation', 'StudentProfileController@generateEnvelopeDocumentEvaluation')->name('admin.student.generate.envelope-document-evaluation');
    Route::get('students/{student}/generate/scholastic-data', 'StudentProfileController@generateScholasticData')->name('admin.student.generate.scholastic-data');

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

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {

        Route::get('/', function () {
            return redirect()->route('settings.documents.index');
        });

        // Documents
        Route::resource('documents', 'DocumentController');

        // Courses 
        Route::resource('courses', 'CourseController');

        // Year Level
        Route::resource('year-levels', 'YearLevelController');

        // Semesters
        Route::resource('semesters', 'SemesterController');
        Route::post('semester/select2', 'SemesterController@ajax_select2_search');

        // Honors
        Route::resource('honors', 'HonorsController');

        // School year
        Route::resource('school-years', 'SchoolYearController');
        Route::post('school-year/select2', 'SchoolYearController@ajax_select2_plus_search');
    });

    // Documents Type
    Route::get('documents/category/{category}', 'DocumentController@ajax_retrieve_by_category');
    Route::post('documents/document-types', 'DocumentController@ajax_retrieveTypes');

    Route::post('select2/settings/school-year/base', 'SchoolYearController@ajax_select2_base_search');
});
