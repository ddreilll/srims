<?php



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












Auth::routes();
Route::get('lang/{locale}', 'LanguageController@lang');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::view('permission-denied', 'errors.permission-denied')->name('denied');
Route::view('account-disabled', 'errors.account-disabled')->name('disabled');
Route::view('account-not-found', 'errors.account-not-found')->name('notfound');