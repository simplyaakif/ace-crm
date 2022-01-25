<?php

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
     */

    //    Route::get('/')

//    Route::get('/', function () {
//        return redirect()->route('home');
//    });

//    Route::get('/database', 'DatabaseController@index');
//    Route::get('/batch-ielts', 'BatchesController@batchNotification');
//    Route::get('/test-sms', 'DatabaseController@send');
    Route::get('/test-mail', 'DatabaseController@testMail');
//    Route::get('/test-bulk-sms', 'DatabaseController@bulkSms');
//    Route::get('/test-total-sale', 'DatabaseController@totalSale');
//    Route::get('/create-role', 'DatabaseController@createRole');


    Route::get('/example/writing', 'DatabaseController@writing');
    Route::post('/example/writing/api', 'DatabaseController@api')->name('writeAPI');


    Route::get('/datatable', 'DatabaseController@datatable');

    Route::get('/course-options', 'DatabaseController@courses')->name('queryData');


    Route::prefix('select')->as('select.')->group(function () {
        Route::get('batches', 'BatchesController')->name('batches');
        Route::get('courses', 'CoursesController')->name('courses');
    });

    Route::prefix('form')->as('form.')->group(function () {
        Route::get('courses', 'CoursesController')->name('courses');
        Route::get('courses/create', 'CoursesController@create')->name('courses_create');
        Route::get('courses/{courses}/edit', 'CoursesController@edit')->name('courses_edit');
        Route::PATCH('courses/update', 'CoursesController@update')->name('courses_update');
    });


//    Queries DataTable
    Route::prefix('examples')->as('examples.')->group(function () {
        Route::view('table', 'testing.datatable')->name('table');
        Route::prefix('table')->as('table.')->group(function () {
            Route::get('init', 'QueryTableController@init')->name('queryinit');
            Route::get('data', 'QueryTableController@data')->name('data');
            Route::get('exportExcel', 'QueryTableController')->name('export-excel');
        });
    });


//    Admissions DataTable
    Route::prefix('admissions')->as('admissions.')->group(function () {
//        Route::view('table', 'testing.datatable')->name('table');

        Route::prefix('table')->as('table.')->group(function () {
            Route::get('init', 'Tables\TableController\AdmissionsTableController@init')->name('admissioninit');
            Route::get('data', 'Tables\TableController\AdmissionsTableController@data')->name('data');
            Route::get('exportExcel', 'Tables\TableController\AdmissionsTableController')->name('export-excel');
        });
    });

    //    Recovery DataTable
    Route::prefix('recovery')->as('recovery.')->group(function () {
//        Route::view('table', 'testing.datatable')->name('table');

        Route::prefix('table')->as('table.')->group(function () {
            Route::get('init', 'RecoveryTableController@init')->name('recoveryinit');
            Route::get('data', 'RecoveryTableController@data')->name('data');
//            Route::get('exportExcel', 'RecoveryTableController')->name('export-excel');
        });
    });

    //    Expenses DataTable
    Route::prefix('expense')->as('expense.')->group(function () {
//        Route::view('table', 'testing.datatable')->name('table');

        Route::prefix('table')->as('table.')->group(function () {
            Route::get('init', 'ExpenseTableController@init')->name('expenseinit');
            Route::get('data', 'ExpenseTableController@data')->name('data');
//            Route::get('exportExcel', 'RecoveryTableController')->name('export-excel');
        });
    });

    //    Recovery DataTable
    Route::prefix('fadmissions')->as('fadmissions.')->group(function () {
//        Route::view('table', 'testing.datatable')->name('table');

        Route::prefix('table')->as('table.')->group(function () {
            Route::get('init', 'FadmissionsTableController@init')->name('fadmissioninit');
            Route::get('data', 'FadmissionsTableController@data')->name('data');
//            Route::get('exportExcel', 'RecoveryTableController')->name('export-excel');
        });
    });


    Auth::routes();

    Route::get('/dash', 'HomeController@index')->name('home');


    //Main Window , HomePage, Reports

    //  Mails & Marketing Routes
    Route::prefix('marketing')->group(function () {

        // Route New Registration Mail
//        Route::get('mail', function () {
//            return view('Pages/Mail Setup/Queries Mails/bNewRegistration');
//        });
    });


    //Queries
    Route::group([
                     'prefix'     => 'queries',
                     'middleware' => 'auth'
                 ], function () {

        Route::get('all', 'QueriesController@index')->name('queries');
        Route::get('manage', 'QueriesController@manage')->name('q_manage');
        Route::get('search', 'QueriesController@search')->name('q_search');
        Route::post('searchdata', 'QueriesController@options')->name('q_search_options');
        Route::get('create', 'QueriesController@create')->name('q_create');
        Route::post('info', 'QueriesController@info')->name('q_info');
        Route::post('save', 'QueriesController@save')->name('q_save');
        Route::put('update', 'QueriesController@update')->name('q_update');
        Route::delete('delete/{id}', 'QueriesController@delete')->name('q_delete');

    });


    // Admissions/Student Section
    Route::group([
                     'prefix'     => 'admissions',
                     'middleware' => 'auth'
                 ], function () {

        Route::get('new-admission', 'AdmissionsController@index')->name('s_create');
        Route::get('admissions-status', 'AdmissionsController@status')->name('a_status');
        Route::post('create-admission', 'AdmissionsController@create');
        Route::get('search', 'AdmissionsController@searchStudent')->name('a_search');
        Route::post('search-admissions-data', 'AdmissionsController@searchStudentData');
        Route::get('batches', 'AdmissionsController@batches')->name('a_batches');
        Route::get('delete-student/{id}', 'AdmissionsController@deleteStudent');
    });

    // Academics
    Route::group([
                     'prefix'     => 'academics',
                     'middleware' => 'auth'
                 ], function () {

        Route::get('batches', 'BatchesController@index')->name('academics_batches');
        Route::get('courses', 'CoursesController@index')->name('academics_courses');

        // Create Batch
        Route::post('api/batches', 'BatchesController@store');
        Route::get('api/batches/{batches}', 'BatchesController@show');
        //Update Batch
        Route::put('api/batches', 'BatchesController@store');

        Route::get('api/courses/{courses}', 'CoursesController@show');
        //Create Course
        Route::post('api/courses', 'CoursesController@store');
        //Update Course
        Route::put('api/courses', 'CoursesController@store');
        //Delete Course
        Route::delete('api/courses/{courses}', 'CoursesController@destroy');



        Route::get('/lesson/all', 'LessonPlanController@index')->name('lesson_planner_all');
        Route::get('/lesson/create', 'LessonPlanController@create')->name('lesson_planner_create');
        Route::post('/lesson/store','LessonPlanController@store')->name('lesson_planner_store');
        Route::get('/lesson/show/{id}', 'LessonPlanController@show')->name('lesson_planner_show');

    });

    Route::post('/courses/student-courses', 'CoursesController@studentCourses');

    Route::group([
                     'prefix'     => 'notifications',
                     'middleware' => 'auth'
                 ], function () {
        Route::get('single', 'NotificationController@single')->name('n_single');
    });

    Route::get('session/{student_id}/{batch_id}', 'AdmissionsController@sessionDetails');
    Route::get('student/admissioninfo/{id}/edit', 'AdmissionsController@infoEdit');
    Route::post('student/admissioninfo/update', 'AdmissionsController@infoUpdate');

    Route::post('student/dp', 'AdmissionsController@uploadDp');

    // Finance Section
    Route::group([
                     'prefix'     => 'finance',
                     'middleware' => 'auth'
                 ], function () {
        Route::get('recoveries', 'FinanceController@recoveries')->name('f_recoveries');
        Route::get('expenses', 'FinanceController@expenses')->name('f_expenses');
        Route::post('/pay', 'FinanceController@pay');
        Route::get('admissions', 'FinanceController@admissions')->name('f_admissions');
        Route::post('/recoveries/edit', 'FinanceController@recoveriesEdit');
    });

    Route::group(['prefix' => 'misc'], function () {
        Route::post('load-month-students-for-batch', 'BatchesController@loadMonthlyStudents');
        Route::post('load-student-data', 'AdmissionsController@studentData');
        Route::get('student/{id}', 'AdmissionsController@loadStudent');
    });

    Route::group([
                     'prefix'     => 'hr',
                     'middleware' => 'auth'
                 ], function () {
        Route::get('members', 'FinanceController@recoveries')->name('hr_members');
    });
// MediaManager
//    ctf0\MediaManager\MediaRoutes::routes();


    //Messaging

    Route::group([
                     'prefix'     => 'sms',
                     'middleware' => 'auth'
                 ], function () {
        Route::post('single', 'MessageController@single');
    });




