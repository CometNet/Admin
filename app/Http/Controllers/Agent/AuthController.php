<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Controller;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        $validator = $this->verify($request, 'member.login');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return $this->jumpWrong($messages);
        }

        $ret = Auth::attempt(['name' => $request->get('name'),'password' => $request->get('password')],true);
        if($ret){
            return redirect('/posts');
        }
        return $this->jumpWrong('登录失败,账号或密码不匹配');
    }

    public function logout()
    {
        Auth::logout();
        return \redirect('member/login');
    }


    public function register(){
        return view('admin.auth.register');
    }

    public function postRegister(Request $request){

        $validator = $this->verify($request, 'member.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return $this->jumpWrong($messages);
        }

        $insert = $request->all();
        $insert['password'] = bcrypt($insert['password']);
        $insert['original_password'] = $insert['password'];
        $insert['last_login_ip'] = $request->ip();
        Member::create($insert);
        return $this->jumpSuccess('创建成功',route('member.index'));
    }
}
