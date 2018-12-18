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

// Route untuk user yang baru register
/*Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
	Route::get('/', function(){
		$data['role'] = \App\UserRole::whereUserId(Auth::id())->get();
		return view('home', $data);
	});
	Route::post('upgrade', function(Request $request){
		if($request->ajax()){
			$msg['success'] = 'false';
			$user = \App\User::find($request->id);
			if($user)
				$user->putRole($request->level);
				$msg['success'] = 'true';
			return response()
				->json($msg);
		}
	});
});*/
// Route untuk user yang admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function(){
	Route::get('/', function(){
		//$data['users'] = \App\User::whereDoesntHave('roles')->get();
    $data['users'] = \App\User::whereNotNull('no_ktp')->whereNull('verifikasi')->get();
		$daftar = "daftar";
	  $konten['content']= \App\Content::where('jenis',$daftar)->get();
		return view('admin', $data, $konten,'verifikasi');
	});
});
// Route untuk user yang member
Route::group(['prefix' => 'member', 'middleware' => ['auth','role:member']], function(){
	Route::get('/', function(){
		return view('member');
	});
});

//Route untuk user kontributor membuat konten
Route::group(['middleware' => ['auth','role:kontributor']], function(){
	Route::resource('contents','ContentController',['except'=>'index','show']);
});

//Route untuk Admin
Route::group(['middleware' => ['auth','role:admin']], function(){
	Route::resource('validasi','ValidasiController',['except'=>'index','show']);
	Route::post('daftarkontributor/{slug}/validasi','ValidasiController@store');
});

//Route untuk mendaftar menjadi kontributor
Route::group(['middleware' => 'auth'], function(){
	Route::resource('daftarkontributor','DaftarKontributorController',['except'=>'index','show']);
	Route::post('contents-comment/{id}','ContentCommentController@store');
	Route::delete('contents-comment/{id}','ContentCommentController@destroy');
	Route::get('grafik','GrafikController@index');
	Route::get('/like/{type}/{model}','LikeController@like');
	Route::get('/unlike/{type}/{model}','LikeController@unlike');
});


Route::get('/profile/{id?}','HomeController@profile');
//kalau validasi error hapus ini
Route::resource('validasi','ValidasiController',['only'=>['index','show']]);
Route::get('contents/filter/kategori/{kategori}','ContentController@filter');
Route::get('contents/filter/{berdasarkan}','ContentController@filter2');
Route::resource('contents','ContentController',['only'=>['index','show']]);
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/faq',function(){
	return view('faq');
});
Auth::routes();
