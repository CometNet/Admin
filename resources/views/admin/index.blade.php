@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h4>会员监控</h4>

                    <p>监控同IP下登录的会员</p>
                </div>
                <div class="icon">
                    {{--<i class="ion ion-pie-graph"></i>--}}
                </div>
                <a href="?type=1" class="small-box-footer">查看</a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h4>大额监控</h4>

                    <p>监控大额转入/转出行为的会员</p>
                </div>
                <div class="icon">
                    {{--<i class="ion ion-pie-graph"></i>--}}
                </div>
                <a href="?type=2" class="small-box-footer">查看</a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-red text-center">
                <div class="inner">
                    <h4>套利监控</h4>

                    <p>监控频繁转出行为的会员</p>
                </div>
                <div class="icon">
                    {{--<i class="ion ion-pie-graph"></i>--}}
                </div>
                <a href="?type=3" class="small-box-footer">查看</a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <style>
        .apiList{
            font-size: 18px;
            font-weight: bold;
            padding: 0 15px;
        }
        .apiList span{
            color: red;
            font-weight: normal;
        }
        .apiList img{
            margin:0 auto 15px;
            width: 50%;
            display: block;
        }
        .content-wrapper {
            background-color: #ffffff;
        }
        .apiList>div{
            border-right: 1px solid #666
        }
        .apiList .pull-left {
            padding-left: 10px;
        }
        .apiList .pull-right {
            padding-right: 5px;
        }
    </style>
    <div class="row apiList clearfix">
        <div class="col-xs-2">
            <div class="text-center">
                <button class="btn btn-primary refresh-all">全部刷新</button>
            </div>
        </div>
    </div>
    <!-- Main content -->
@endsection
@section('after.js')
    <script src="{{ asset('/backstage/js/style.js') }}"></script>
    <script src="{{ asset('/backstage/js/echarts.min.js') }}"></script>
    <script src="{{ asset('/backstage/js/macarons.js') }}"></script>
@endsection
