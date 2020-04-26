<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller{

    public function index(Request $request){
        $mod = new Channel();
        $name = '';
        if ($request->has('name'))
        {
            $name = $request->get('name');
            $mod = $mod->where('name', 'like', "%$name%");
        }
        $data = $mod->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
        return view('admin.channel.index',compact('data','name'));
    }

    public function destroy($id)
    {
        Channel::destroy($id);

        return $this->jumpSuccess();
    }

    public function edit($id){
        $data = Channel::findOrFail($id);
        return view('admin.channel.edit',compact('data'));
    }

    public function check($id, $status){
        $mod = Channel::findOrFail($id);
        if($mod->status == $status){
            return $this->jumpWrong("状态已经变更");
        }
        $mod->status = $status;
        $mod->save();
        return $this->jumpSuccess('状态变更成功');
    }

    public function update(Request $request, $id){

        $validator = $this->verify($request, 'channel.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return $this->jumpWrong($messages);
        }
        $data = $request->all();
        $mod = Channel::findOrFail($id);
        $mod->update($data);
        return $this->success('','',route('channel.index'));
    }

    public function store(Request $request){

        $validator = $this->verify($request, 'channel.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return $this->jumpWrong($messages);
        }

        $insert = $request->all();
        $insert['password'] = bcrypt($insert['password']);
        $insert['original_password'] = $insert['password'];
        $insert['last_login_ip'] = $request->ip();
        Channel::create($insert);
        return $this->jumpSuccess('创建成功',route('channel.index'));
    }

    public function create()
    {
        return view('admin.channel.create');
    }
}
