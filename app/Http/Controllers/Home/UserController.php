<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Tools\SetPageAuto;
use App\LogOfInfo as LogOfInfo;
use App\Users as Users;
use App\User as User;
use App\Phone as Phone;
use Tymon\JWTAuth\Facades\JWTAuth;



class UserController extends Controller
{
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     * @author LaravelAcademy.org
     */
    public function show(Request $request)
    {
        $wenjian = $request->file('file');
        if ($wenjian->isValid()) {

            //获取文件的原文件名 包括扩展名
            $yuanname= $wenjian->getClientOriginalName();

            //获取文件的扩展名
            $kuoname=$wenjian->getClientOriginalExtension();

            //获取文件的类型
            $type=$wenjian->getClientMimeType();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path=$wenjian->getRealPath();

            //要保存的文件名 时间+扩展名
            $filename=date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$kuoname;
            //保存文件          配置文件存放文件的名字  ，文件名，路径
            dump($path);
            dump($filename);

            $bool= Storage::disk('upload')->put($filename,file_get_contents($path));
            dd($bool);
        }

    }
    public function testModel(){

        //$log_of_info = LogOfInfo::find([1,2,3]);
        //
        //foreach ($log_of_info as $value) {
        //    echo $value->name;
        //    echo '<br/>';
        //}
        //dump(bcrypt(123456));
        //$newUser = [
        //    'email' => 'aeweekk@qq.com',
        //    'name' => 'allen.tai22',
        //    'password' => bcrypt(1234567),
        //
        //];
        //
        //$user = Users::find(17);
        //$token = JWTAuth::fromUser($user);

        //dump($token);
        //$user = Users::find(21);
        //$token = JWTAuth::tokenById(21);
        //dump($token);
        //$phone = User::find(1)->phone;
        //foreach ($phone as $index => $item) {
        //    dump($item->created_at);
        //}
        $phone = User::find(1);
        dump($phone->name);
        dump($phone->name_all_diff);
        $phone->name = 'XXX.tai';
        dump($phone->name);
        $phone->save();
        //$phone->name = 'abby';
        //$phone->save();




    }
    public function profile()
    {
        //dump($id);
        //$path = $request->path();
        //dd($path);

        return view('user.profile');
    }
    public function index(Request $request){
        $users = DB::table('test')->limit(100)->select()->get()->toArray();
        //$page = new SetPageAuto();
        $res = SetPageAuto::getPage($request,$users,5,'/home/index',['state'=>1]);
        //dump($res);
        return view('user.profile', ['users' => $res['data'],'pages'=>$res['pages']]);



    }
}
