<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller{
    public function index(Request $request){
        return view('admin.dashboard.index');
    }
    public function update(){

    }
}
