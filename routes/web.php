<?php
use Illuminate\Http\Request;




Route::get('/', function (Request $request) {

	$request->flash();

    return view('welcome');
});


// Route::get('projects/create', function (Request $request) {

//     return view('projects.create');
// });

Route::post('projects', function(Request $request){

	flash('Your Project has been created');
	$request->flash();

	return redirect('/projects');
});
// use App\Notifications\SubscriptionRenewalFailed;

// Route::get('/', function(){
// 	$user = App\User::first();

// 	$user->notify(new SubscriptionRenewalFailed);

// 	return 'Done';
// });
/*
    GET /projects (index)
    GET /projects/create (create)
    GET /projects/1 (show)
    POST /projects (store)
    GET /projects/1/edit (edit)
    PATCH /projects/1 (update)
    DELETE /projects/1 (desotroy)
 */

Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


