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

Route::get('/', 'IndexController@index');

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
Route::get('kang','IndexController@kang');
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
        // \Auth::logout();
        \Session::forget('user');

        return redirect('/index');
    });
	Route::get('captcha', function(){
		$builder = new CaptchaBuilder;
		$builder->build();
		Session::put('captcha',$builder->getPhrase()); //存储验证码
		return response($builder->output())->header('Content-type','image/jpeg');
	});

    //pay支付
    Route::get('pay',function(){
        // 创建支付单。
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo('123456789788999');
        $alipay->setTotalFee('0.01');
        $alipay->setSubject('hghghg');
        $alipay->setBody('hghghg');

        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());
    });
    
    Route::get('alipay',function(){
        dd($_GET);
    });

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

    Route::get('aa',function(){

    });


    //微博第三方
    Route::any('login/weibo',['uses'=>'LoginController@weibo']);
    Route::any('login/weibo_login',['uses'=>'LoginController@weibo_login']);

    //医院科室展示
    Route::get('index/offices','OfficesController@show');
    //医院科室添加页
    Route::get('index/addpage','OfficesController@addpage');
    //医院科室添加
    Route::post('index/officeadd','OfficesController@officeadd');
    //医院科室多级显示
    Route::post('index/offspid','OfficesController@offspid');
    //科室医生展示页
    Route::get('index/doctor','DoctorController@showpage');

    Route::get('show_all/{id}',['as'=>'index/show_all','uses'=>'AboutController@show']);
    //ajax点赞
    Route::get('about/zan','AboutController@zan');

    //qq第三方登陆
    Route::any('index/qq_login',['uses'=>'LoginController@qq_login']);
    Route::any('login/yan',['uses'=>'LoginController@yan']);
    Route::any('login/user_bind',['uses'=>'LoginController@user_bind']);

     // 公共页面 pc
    Route::any('/pc',function () {
        return view('layouts.promt');
    });

    Route::any('/ServiceShow',['uses'=>'ServiceController@ServiceShow']);

    Route::get('/doctor/id/{id}',['uses'=>'ServiceController@doctor']);

});

// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });


Route::group(['middleware'=>['web','admin'],'namespace' => 'Admin'], function(){
	Route::group(['prefix'=>'admin'],function(){
        Route::any('index',['uses'=>'HomeController@index']);
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


        // 权限---用户
        Route::any('BackUser',['uses'=>'BackUserController@index']);
        Route::any('BackUserAdd',['uses'=>'BackUserController@UserAdd']);
        Route::any('BackUserShow',['uses'=>'BackUserController@show']);


        // 权限---角色
        Route::any('BackRoleAdd',['uses'=>'BackRoleController@RoleAdd']);
        Route::any('BackRoleShow',['uses'=>'BackRoleController@RoleShow']);
        Route::any('BackRoleDel',['uses'=>'BackRoleController@RoleDel']);
        Route::any('BackRoleSave',['uses'=>'BackRoleController@RoleSave']);


        // 权限--
        Route::any('BackMenu',['uses'=>'BackMenuController@MenuAdd']);
        Route::any('BackMenuAdd',['uses'=>'BackMenuController@MenuAdd']);
        Route::any('BackMenuShow',['uses'=>'BackMenuController@MenuShow']);


        //科室
        Route::get('departmentindex',['uses'=>'DepartmentController@department']);
        Route::any('departmentadd',['uses'=>'DepartmentController@departmentadd']);
        Route::any('departmentdel',['uses'=>'DepartmentController@departmentdel']);

        //医疗常识
        Route::get('title','TitleController@index');
        Route::post('title',['middleware'=>'upload:title_img','uses'=>'TitleController@index']);
        Route::get('title/add',function(){
            return view('admin.title.add');
        });

        //套模板
        Route::get('left',['uses'=>'HomeController@index_left']);
        Route::get('head',function(){
            return view('admin.inc.backend_head');
        });
        Route::get('main',function(){
            return view('admin.inc.backend_main');
        });

        //ajax增加点赞数
        Route::get('ajax/title','TitleController@ajax');

        //增加后台管理
        Route::post('userAdd','UserController@userAdd');

         //广告营销
        Route::get('ad','AdController@index');
	});
});

Route::group(['middleware'=>['web'],'namespace'=>'Admin'],function(){
    Route::match(['get','post'],'admin/login','LoginController@index');
    Route::get('admin/goout','LoginController@goout');
});

/**
 * 医院用户管理后台
 */

Route::group(['middleware'=>'web','namespace' => 'Hospitalback'], function(){
    Route::group(['prefix'=>'hos'],function(){
          Route::get('goodaddshow',['uses'=>'KillgoodsController@index']);
          Route::post('goodsadd',['uses'=>'KillgoodsController@goodsadd']);
          Route::get('goodshow',['uses'=>'KillgoodsController@goodsshow']);
          Route::get('kill',function(){echo 111 ;});
        //后台首页展示
         Route::get('index',['uses'=>'IndexController@index']);
        //详情管理页面
         Route::get('details',['uses'=>'DetailsController@details']);
        //详情添加
         Route::post('add',['uses'=>'DetailsController@add']);


        //科室管理页面
         Route::get('offices',['uses'=>'OfficesController@offices']);
        //科室添加页面
         Route::get('addpage',['uses'=>'OfficesController@addpage']);
        //科室多级联动展示查询
        Route::post('offspid',['uses'=>'OfficesController@offspid']);
        //科室多级联动展示查询
        Route::post('officeadd',['uses'=>'OfficesController@officeadd']);
        //医院科室删除
        Route::post('officesdel',['uses'=>'OfficesController@officesdel']);


        
        //医生管理页面
         Route::any('doctor',['uses'=>'DoctorController@doctorshow']);
         //医生删除
         Route::post('doctordel',['uses'=>'DoctorController@doctordel']);
         //医生添加页面
         Route::get('doctorpage',['uses'=>'DoctorController@Doctorpage']);
          //医生添加页面科室二级分类
         Route::post('docoffs',['uses'=>'DoctorController@docoffs']);
        //医生信息添加
         Route::post('doctoradd',['uses'=>'DoctorController@doctoradd']);
        //医生信息修改页面
         Route::any('doctorup',['uses'=>'DoctorController@doctoruppage']);
        //医生信息添加
         Route::post('doctorupadd',['uses'=>'DoctorController@doctorupadd']);

        //值班管理页面
         Route::get('rota',['uses'=>'RotaController@rotashow']);
        //值班添加页面
         Route::get('rotaaddpage',['uses'=>'RotaController@rotaaddpage']);
         //医生值班信息添加
         Route::post('rotaadd',['uses'=>'RotaController@rotaadd']);
         //医生值班信息删除
         Route::post('rotadel',['uses'=>'RotaController@rotadel']);
         //值班管理页面
         Route::get('tables',['uses'=>'TablesController@tables']);
        //地图页面
        // Route::get('tables',['uses'=>'TablesController@tables']);
         
        // Route::get('pc/',['uses'=>'TablesController@tables']);

    });
});


		
