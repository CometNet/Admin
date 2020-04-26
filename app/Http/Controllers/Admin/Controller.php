<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function verify(Request $request, $config){
        $arr = config('validation.'.$config);

        $rules = $name = $message = [];

        foreach ($arr as $key => $val)
        {
            $rules[$key] = $val['rules'];
            $name[$key] = $val['name'];
            if (isset($val['message']) && is_array($val['message']) && !empty($val['message']))
            {
                foreach($val['message'] as $k => $v)
                {
                    $message[$key.'.'.$k] = $v;
                }
            }
        }

        return Validator::make(
            $request->all(),
            $rules,
            $message,
            $name
        );
    }

    protected function success($data = '', $msg = '成功', $url = '', $header = 'Content-Type', $value = 'application/json'){
        return responseSuccess($data,$msg,$url,$header,$value);
    }

    protected function wrong($msg = '失败',  $data = '', $url = '', $code = 1, $header = 'Content-Type', $value = 'application/json'){
        return responseWrong($msg,$data,$url,$code,$header,$value);
    }

    protected function jumpSuccess($msg = '', $route = ''){
        return respS($msg,$route);
    }

    protected function jumpWrong($msg = '', $route = ''){
        if (is_array($msg)){
            $temp = '';
            foreach ($msg as $item){
                $temp .= implode(',',$item);
            }
        }else{
            $temp = $msg;
        }
        return respF($temp,$route);
    }
}
