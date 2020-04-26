<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="{{ asset('/node_modules/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>Alexander Pierce</p>--}}
                {{--<!-- Status -->--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">NG.</li>
            <!-- Optionally, you can add icons to the links -->
            @foreach(config('admin_menu') as $k => $item)
                    @if (!isset($item['hide']))
                    <li class="treeview" id="{{$k}}">
                        <a @if($item['router']) href="{{ route($item['router']) }}" @else href="#" @endif>
                            <i class="{{ $item['icon'] }}"></i>
                            <span>{{ $item['name'] }}</span>
                            @if(isset($item['submenus']) && count($item['submenus']) > 0)
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                <small class="label pull-right bg-green tip_msg"></small>
                            </span>
                            @endif
                            {{--<span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>--}}
                        </a>

                        @if(isset($item['submenus']) && count($item['submenus']) > 0)
                            <ul class="treeview-menu">
                                @foreach($item['submenus'] as $v)
                                    <li @if($active_route == $v['router']) class="active" @endif><a @if($v['router']) href="{{ route($v['router']) }}" @else href="javascript:;" @endif><i class="fa fa-circle-o"></i> {{ $v['title'] }}
                                            <span class="pull-right-container">
                                      <span class="label bg-green pull-right tip_msg_sk"></span>
                                    </span></a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endif
            @endforeach
            <script>
                $(function(){
                    $('.ctr-l').click(function(){
                        layer.alert('请联系销售人员开通');
                    })

                })
            </script>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<script>
    $(function(){
        $('.treeview').each(function(e){
            var li_a_num = $(this).find('.active').length
            if (li_a_num > 0)
                $(this).addClass('active')
        })
    })
</script>
