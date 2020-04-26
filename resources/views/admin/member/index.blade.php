@extends('admin.layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.css') }}">
    <script src="{{ asset('/node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <section class="content">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h3 class="panel-title">会员列表</h3>
             </div>
             <div class="panel-body">
                 @include('admin.member.filter')
                 <table id="tab" class="table table-bordered table-hover text-center">
                     <thead>
                     <tr>
                         <th style="width: 5%">ID</th>
                         <th class="text-center" style="width: 5%">用户名</th>
                         <th  style="width: 5%">中心账户</th>
                         {{--<th  style="width: 8%">红利账户</th>--}}
                         <th  style="width: 5%">来源地址</th>
                         <th  style="width: 5%">真实姓名</th>
                         <th  style="width: 5%">代理/上级</th>
                         <th  style="width: 5%">手机/邮箱</th>
                         <th  style="width: 5%">QQ/微信</th>
                         <th  style="width: 5%">注册IP</th>
                         <th  style="width: 5%">注册时间</th>
                         <th  style="width: 5%">状态</th>
                         <th  style="width: 5%">在线</th>
                         <th  style="width: 5%">上次登陆IP</th>
{{--                         @if($ag && $ag->on_line==0&& $ags &&$ags->on_line==0)--}}
{{--                         <th  style="width: 5%">AGS</th>--}}
{{--                         @endif--}}
{{--                         @if($sunbet && $sunbet->on_line==0 && $sunbets &&$sunbets->on_line==0)--}}
{{--                             <th  style="width: 5%">SUNBETS</th>--}}
{{--                         @endif--}}
                         <th  style="width: 25%">操作</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($data as $item)
                         <tr>
                             <td>
                                 {{ $item->id }}
                             </td>
                             <td>
                                 {{ $item->name }}
                             </td>
                             <td>
                                 {{$item->last_login_ip}}
                             </td>
                             <td>
                                 @if ($item->status == 1)
                                     <a href="{{ route('member.check', ['id' => $item->getKey(), 'status' => 0]) }}" class="btn btn-danger btn-xs" onclick="return confirm('确定下线吗？')">下线</a>
                                 @elseif($item->status == 0)
                                     <a href="{{ route('member.check', ['id' => $item->getKey(), 'status' => 1]) }}" class="btn btn-success btn-xs" onclick="return confirm('确定上线吗？')">上线</a>
                                 @endif
                                 <a href="{{ route('member.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-xs">修改</a>
                                 <button class="btn btn-danger btn-xs"
                                         data-url="{{route('member.destroy', ['id' => $item->getKey()])}}"
                                         data-toggle="modal"
                                         data-target="#delete-modal"
                                 >
                                     删除
                                 </button>
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                 </table>
                 <div class="clearfix">
                     <div class="pull-left" style="margin: 0;">
                         <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                     </div>
                     <div class="pull-right" style="margin: 0;">
                         {!! $data->appends(['name' => $name])->links() !!}
                     </div>
                 </div>
             </div>
         </div>

     </section><!-- /.content -->
@endsection
@section("after.js")
     @include('admin.layouts.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'])
@endsection
