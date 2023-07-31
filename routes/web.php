<?php

use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('home')->with('status', session('status'));
    }

    return redirect()->route('home');
});

Auth::routes(['register' => false]);

$defaultMiddlewares = ['auth', 'user.status'];

Route::group(['middleware' => $defaultMiddlewares, 'namespace' => 'Admin'], function () {
    Route::get('deactivated', 'UsersController@showDeactivated')->name('users.deactivated');
});

if (Schema::hasTable((new Configuration())->table)) {
    foreach (Configuration::select('key', 'value')->whereIn('key', ['panel.2fa', 'panel.email_verified'])->get() as $config) {
        switch ($config->key) {
            case 'panel.2fa':
                if ($config->value == "on") {
                    array_push($defaultMiddlewares, '2fa');
                }
                break;

            case 'panel.email_verified':
                if ($config->value == "on") {
                    array_push($defaultMiddlewares, 'verified');
                }
                break;
        }
    }
}

Route::group(['middleware' => $defaultMiddlewares], function () {

    Route::group(['namespace' => 'Admin'], function () {
        Route::get('/dashboard', 'HomeController@index')->name('home');

        Route::get('ajax/student-per-year', 'DashboardController@ajax_retrieve_total_student_per_year');

        Route::get('gradesheet', 'GradesheetController@index')->name('admin.gradesheet.index');
        Route::get('gradesheet/create', 'GradesheetController@create')->name('admin.gradesheet.create');
        Route::get('gradesheet/{gradesheet}', 'GradesheetController@show')->whereNumber('gradesheet')->name('admin.gradesheet.show');
        Route::post('gradesheet/{gradesheet}/validate/student-enrollment', 'GradesheetController@validateStudentEnrollment')->name('admin.gradesheet.validate.student-enrollment');
        Route::post('gradesheet/{gradesheet}/form-validate/student', 'GradesheetController@validateStudent')->name('admin.gradesheet.form-validate.student');
        Route::get('gradesheet/{gradesheet}/pages', 'GradesheetController@getPages')->name('admin.gradesheet.pages');
        Route::get('gradesheet/{gradesheet}/page-rows', 'GradesheetController@getPageRows')->name('admin.gradesheet.page.rows');
        Route::post('gradesheet/{gradesheet}/page-details', 'GradesheetController@getPageDetails')->name('admin.gradesheet.pages-details');
        Route::delete('gradesheet/{gradesheet}', 'GradesheetController@destroy')->name('admin.gradesheet.destroy');

        Route::post('gradesheet/store', 'GradesheetController@store');
        Route::get('gradesheet/{gradesheet}/edit', 'GradesheetController@edit')->name('admin.gradesheet.edit');
        Route::post('gradesheet/{gradesheet}', 'GradesheetController@save')->name('admin.gradesheet.update');

        Route::post('gradesheet/{gradesheet}/students', 'GradesheetController@storeStudents')->name('admin.gradesheet-students.store');
        Route::get('gradesheet/{gradesheet}/students/{student}', 'GradesheetController@showStudent')->name('admin.gradesheet-students.show');
        Route::post('gradesheet/{gradesheet}/students/{student}', 'GradesheetController@updateStudent')->name('admin.gradesheet-students.update');
        Route::delete('gradesheet/{gradesheet}/students/{student}', 'GradesheetController@destroyStudent')->name('admin.gradesheet-students.destroy');

        Route::get('gradesheet/{gradesheet}/generate/pdf', 'GradesheetController@generatePdf')->name('admin.gradesheet.generate.pdf');


        Route::get('student/profile', 'StudentProfileController@index')->name('admin.student.index');
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

        // Students
        Route::resource('students', 'StudentController');

        // User Accounts
        Route::patch('users/{user}/status', 'UsersController@updateStatus')->name('users.update-status');
        Route::put('users/config/{configKey}', 'UsersController@updateConfig')->name('users.updateConfig');
        Route::resource('users', 'UsersController');

        // Subject
        Route::post('subject/select2', 'SubjectController@ajax_select2_search');

        // Instructor
        Route::post('instructor/select2', 'InstructorController@ajax_select2_search');

        // Course
        Route::post('select2/course', 'CourseController@select2');

        // Room
        Route::post('room/select2', 'RoomController@ajax_select2_search');

        // Documents Type
        Route::get('documents/category/{category}', 'DocumentController@ajax_retrieve_by_category');
        Route::post('documents/document-types', 'DocumentController@ajax_retrieveTypes');

        // School Year
        Route::post('select2/settings/school-year/base', 'SchoolYearController@ajax_select2_base_search');


        // Roles
        Route::resource('roles', 'RolesController');

        // Users
        Route::resource('users', 'UsersController');

        // User Alerts
        Route::get('user-alerts/read', 'UserAlertsController@read');
        Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

        Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
        Route::get('messenger', 'MessengerController@index')->name('messenger.index');
        Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
        Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
        Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
        Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
        Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
        Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
        Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
        Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::resource('backups', 'BackupController');
        Route::get('backups/download/{file_name}', 'BackupController@download')->name('backups.export');


        Route::group(['namespace' => 'Admin'], function () {

            Route::get('/', function () {
                return view('admin.settings.index');
            });

            // Documents
            Route::resource('documents', 'DocumentController');

            // Courses 
            Route::resource('courses', 'CourseController');

            // Honors
            Route::resource('honors', 'HonorsController');

            // Rooms
            Route::resource('rooms', 'RoomController');

            // Instructors
            Route::resource('instructors', 'InstructorController');

            // Subjects
            Route::resource('subjects', 'SubjectController');

            // Year Level
            Route::resource('year-levels', 'YearLevelController');

            // Semesters
            Route::resource('semesters', 'SemesterController');
            Route::post('semester/select2', 'SemesterController@ajax_select2_search');

            // School year
            Route::resource('school-years', 'SchoolYearController');
            Route::post('school-year/select2', 'SchoolYearController@ajax_select2_plus_search');
        });
    });

    Route::group(['prefix' => 'my-profile', 'as' => 'my-profile.', 'namespace' => 'Auth'], function () {
        // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('edit', 'ChangePasswordController@edit')->name('edit');
            Route::post('edit', 'ChangePasswordController@update')->name('update');
            Route::post('/', 'ChangePasswordController@updateProfile')->name('updateProfile');
            Route::post('two-factor', 'ChangePasswordController@toggleTwoFactor')->name('toggleTwoFactor');
        }
    });

    Route::group(['namespace' => 'Auth'], function () {
        // Two Factor Authentication
        if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
            Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
            Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
            Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
        }
    });
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'email', 'as' => "verification."], function () {

    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('notice');

    Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/home')->with('verified', true);
    })->middleware(['signed'])->name('verify');

    Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link has been sent.');
    })->middleware(['throttle:6,1'])->name('send');

    Route::get('/email/verification-notification', function (\Illuminate\Http\Request $request) {
        return view('auth.verify');
    })->name('resend');
});
