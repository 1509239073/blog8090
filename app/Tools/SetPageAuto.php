<?php
/**
 * Created by PhpStorm.
 * User: taixing
 * Date: 2019/5/6
 * Time: 22:33
 */

namespace App\Tools;
use App\Tools\CustomPage;


class SetPageAuto
{
    public static function getPage($request,$data,$countPage, $url,$search){
        $nowPage = null !=$request->input('nowPage')?$request->input('nowPage') : 1;
        //dump($nowPage);
        $data = array_slice($data,($nowPage-1)*20,20);
        //dump($search);
        $pages = CustomPage::getSelfPageView($nowPage, $countPage, $url, $search);
        $res['pages'] = $pages;
        $res['data'] = $data;
        return $res;
    }
}