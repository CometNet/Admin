<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Jobs\OrderJob;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller{

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

    public function test(){
        $this->dispatch(new OrderJob(1));
    }
}
