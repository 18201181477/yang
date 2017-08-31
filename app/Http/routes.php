<?php
use Gregwar\Captcha\CaptchaBuilder;
// use Illuminate\Http\Request;
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
    Route::get('home','IndexController@index');
   	Route::get('member/info',['uses'=>'MemberController@info']);
	Route::get('/index',['as'=>'index/index','uses'=>'IndexController@index']);
	Route::get('/about',['as'=>'index/about','uses'=>'AboutController@about']);
	Route::get('/service',['as'=>'index/services','uses'=>'ServiceController@service']);
	Route::get('/news',['as'=>'index/news','uses'=>'NewController@news']);
	Route::get('/contact',['as'=>'index/contact','uses'=>'ContactController@contact']);
	Route::get('/index/login','Auth\AuthController@getLogin');
    Route::post('/index/login','Auth\AuthController@postLogin');
	Route::get('index/register','Auth\AuthController@getRegister');
	Route::post('index/register','Auth\AuthController@postRegister');
    Route::post('contact','ContactController@contactadd');
    // Route::get('index/logout','Auth\AuthController@getLogout');
    Route::get('index/logout',function(){
        \Auth::logout();
        return view('index.index');
    });
	Route::get('captcha', function(){
		$builder = new CaptchaBuilder;
		$builder->build();
		Session::set('captcha',$builder->getPhrase()); //存储验证码
		return response($builder->output())->header('Content-type','image/jpeg');
	});

    //支付中间键
    Route::get('pay',['middleware'=>'App\Http\Middleware\PayMiddleware','uses'=>'IndexController@pay']);
    //用户完善页面
    Route::get('index/perfect','PerfectController@perfect');
    //医院详情添加
    Route::post('Perfect/add','PerfectController@add');

    //医院详情
    Route::get('/info/id/{id}',['as'=>'index/hospital','uses'=>'ServiceController@info']);
    //预约挂号
    Route::get('/queque/id/{id}',['as'=>'index/queque','uses'=>'ServiceController@queque']);
    //医院科室
    Route::get('/department/id/{id}',['as'=>'index/department','uses'=>'ServiceController@department']);

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

        //我们的团队
        Route::any('member',['uses'=>'MemberController@index']);
        Route::get('memberindex',['uses'=>'MemberController@member']);
        Route::any('memberadd',['uses'=>'MemberController@info']);
        Route::any('memberShow',['uses'=>'MemberController@memberShow']);
        Route::any('memberDel',['uses'=>'MemberController@memberDel']);
        Route::any('memberSave',['uses'=>'MemberController@memberSave']);


        //科室
        Route::get('department',['uses'=>'DepartmentController@index']);
        Route::get('departmentindex',['uses'=>'DepartmentController@department']);
        Route::any('departmentadd',['uses'=>'DepartmentController@departmentadd']);
        Route::any('departmentdel',['uses'=>'DepartmentController@departmentdel']);
	});
});


		
