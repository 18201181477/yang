<?php
use Gregwar\Captcha\CaptchaBuilder;
// use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index.index');
});

// Route::get('member/info',[
// 	'uses'=>'MemberController@info',
// 	'as'=>'memberinfo',
// ]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
   	Route::get('member/info',['uses'=>'MemberController@info']);
	Route::get('/index',['as'=>'index/index','uses'=>'IndexController@index']);
	Route::get('/about',['as'=>'index/about','uses'=>'AboutController@about']);
	Route::get('/service',['as'=>'index/services','uses'=>'ServiceController@service']);
	Route::get('/new',['as'=>'index/news','uses'=>'NewController@new']);
	Route::get('/contact',['as'=>'index/contact','uses'=>'ContactController@contact']);
	Route::get('/index/login',function(){
		return view('login.login');
	});
	Route::get('index/register','Auth\AuthController@getRegister');
	Route::post('auth/register','Auth\AuthController@postRegister');

	Route::get('captcha', function(){
		$builder = new CaptchaBuilder;
		$builder->build();
		\Session::set('captcha',$builder->getPhrase()); //存储验证码
		return response($builder->output())->header('Content-type','image/jpeg');
	});

});

// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });



Route::group(['middleware'=>'web','namespace' => 'Admin'], function(){
	Route::group(['prefix'=>'admin'],function(){
		Route::any('login/index',['uses'=>'LoginController@index']);
        Route::get('index',['uses'=>'IndexController@index']);
        Route::get('home',['uses'=>'HomeController@home']);


        Route::get('user',['uses'=>'UserController@index']);
        Route::get('userindex',['uses'=>'UserController@user']);


        Route::get('banner',['uses'=>'BannerController@index']);
        Route::get('bannerindex',['uses'=>'BannerController@banner']);
        Route::get('banneradd',['uses'=>'BannerController@banneradd']);


        Route::get('vip',['uses'=>'VipController@index']);
        Route::get('vipindex',['uses'=>'VipController@vip']);


        Route::get('connoisseur',['uses'=>'ConnoisseurController@index']);
        Route::get('connindex',['uses'=>'ConnoisseurController@connoisseur']);


        Route::get('topic',['uses'=>'TopicController@index']);
        Route::get('topicindex',['uses'=>'TopicController@topic']);


        Route::get('appointment',['uses'=>'AppointmentController@index']);
        Route::get('appointmentindex',['uses'=>'AppointmentController@appointment']);


        Route::get('balance',['uses'=>'BalanceController@index']);
        Route::get('balanceindex',['uses'=>'BalanceController@balance']);


        Route::get('changepwd',['uses'=>'ChangepwdController@index']);
        Route::get('changepwdindex',['uses'=>'ChangepwdController@changepwd']);


        Route::get('wish',['uses'=>'WishController@index']);
        Route::get('wishindex',['uses'=>'WishController@wish']);


        Route::get('opinion',['uses'=>'OpinionController@index']);
        Route::get('opinionindex',['uses'=>'OpinionController@opinion']);
	});
});


		
