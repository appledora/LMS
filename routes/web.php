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
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landing');
});
Route::get('/loginas', function () {
    return view('loginOption');
});
if(Auth::guard('web_student') || Auth::guard('web_faculty')){
    Route::get('booklist', 'BooktestController@showBooklist');
   // Route::get('requestBook/{ISBN_code}','StudentController@requestBook');
}

Route::group(['middleware' => 'student_guest'], function () {Route::get('/student_register', 'StudentRegisterController@showForm');
    Route::post('/student_register', 'StudentRegisterController@register');
    Route::post('student_login', 'StudentLoginController@login');
    Route::get('student_login', 'StudentLoginController@showForm');
});
Route::group(['middleware' => 'student_auth'], function () {
    Route::post('student_logout', 'StudentLoginController@logout');
    Route::get('requestBook/{ISBN_code}','StudentController@requestBook');
    Route::get('borrowHistory', 'StudentController@borrowHistory');
    Route::get('searchBook', 'BooktestController@searchBooks');
    Route::get('booksearch','StudentController@searchBooks');
    Route::get('student_home', function () {
        return view('student.studentDashboard');
    });
});

//Logged in users/seller cannot access or send requests these pages
Route::group(['middleware' => 'employee_guest'], function () {
    Route::get('/employee_login', 'EmployeeController@showLoginForm')->name('employee.login');
    Route::post('/employee_login', 'EmployeeController@login')->name('employee.login.post');

});
//Only logged in employees can access or send requests to these pages
Route::group(['middleware' => 'employee_auth'], function () {
    Route::post('/employee_logout', 'EmployeeController@logout');
    Route::get('/categories', 'CategoryController@home');
    Route::post('/addCategory', 'CategoryController@addCategory');
    Route::get('/deleteCategory/{id}', 'CategoryController@deleteCategory');
    Route::get('/addBook', 'BooktestController@showForm');
    Route::post('/insertBook', 'BooktestController@addBook');
    Route::get('/manageBook', 'BooktestController@getBooks');
    Route::get('/updateBook/{ISBN_code}', 'BooktestController@updateBook');
    Route::get('/deleteBook/{ISBN_code}', 'BooktestController@deleteBook');
    Route::post('/manageBooks/update/{id}', 'BooktestController@editBook');
    Route::get('/manageRequest', 'EmployeeController@getRequest');
    Route::get('/manageRequest/acceptRequest/{ISBN_code}/{reg_no}', 'EmployeeController@acceptRequest')->name('accept');
    Route::get('/manageBooks/returnedBook/{reg_no}/{ISBN_code}', 'EmployeeController@returnedBook');
    Route::get('/manageBooks/trackReturn', 'EmployeeController@getAcceptedHistory');
    Route::get('livesearch','EmployeeController@searchBooks');

    Route::get('/employee_home', function () {
        return view('employee.employeeDashboard');
    });
});
Route::group(['middleware' => 'faculty_guest'], function () {
    Route::get('/faculty_login', 'FacultyController@showLoginForm')->name('faculty.login');
    Route::post('/faculty_login', 'FacultyController@login')->name('faculty.login.post');

});

Route::group(['middleware' => 'faculty_auth'], function () {
    Route::post('/faculty_logout', 'FacultyController@logout');
   Route::get('faculty_home',function (){
       return view( 'facultyDashboard');
   });

});
Route::get('/test',function (){
    return view('index');
});


Auth::routes();

