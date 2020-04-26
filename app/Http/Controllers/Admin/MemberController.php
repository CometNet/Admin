<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller{

    public function index(Request $request){
        $mod = new Member();
        $name = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'like', "%$name%");
        }
        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
        return view('admin.member.index',compact('data','name'));
    }

    public function destroy($id)
    {
        Member::destroy($id);

        return $this->jumpSuccess();
    }

    public function edit($id){
        $data = Member::findOrFail($id);
        return view('admin.member.edit',compact('data'));
    }

    public function check($id, $status){
        $mod = Member::findOrFail($id);
        if($mod->status == $status){
            return $this->jumpWrong("状态已经变更");
        }
        $mod->status = $status;
        $mod->save();
        return $this->jumpSuccess('状态变更成功');
    }

    public function create()
    {
        return view('admin.member.create');
    }

    public function update(Request $request, $id){

        $validator = $this->verify($request, 'member.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return $this->jumpWrong($messages);
        }
        $data = $request->all();
        $mod = Member::findOrFail($id);
        $mod->update($data);
        return $this->success('','',route('member.index'));
    }

    public function store(Request $request){

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
