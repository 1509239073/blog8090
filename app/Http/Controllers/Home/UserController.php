<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Tools\SetPageAuto;
use App\LogOfInfo;



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
        $LogOfInfo  = new LogOfInfo();
        $log_of_info = $LogOfInfo::find([1,2,3]);

        foreach ($log_of_info as $value) {
            echo $value->name;
            echo '<br/>';
        }

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
