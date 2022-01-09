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













Auth::routes();
Route::get('lang/{locale}', 'LanguageController@lang');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::view('permission-denied', 'errors.permission-denied')->name('denied');
Route::view('account-disabled', 'errors.account-disabled')->name('disabled');
Route::view('account-not-found', 'errors.account-not-found')->name('notfound');