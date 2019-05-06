<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Tools\CustomPage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function setPageAuto(Request $request,$data,$countPage, $url,$search){

        //$nowPage = $request->input('nowPage');
        //$data = array_slice($data,($nowPage-1)*20,20);
        //$pages = CustomPage::getSelfPageView($nowPage, $countPage, $url, $search);
        //$res['page'] = $pages;
        //$res['data'] = $data;
        //return $res;
    }






}
