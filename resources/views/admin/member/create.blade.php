@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">会员创建</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form" action="{{ route('member.store') }}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">支付类型 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <label><input type="radio" name="type"  value="1" />支付宝</label>
                                <label><input type="radio" name="type"  value="2" />微信</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">支付通道名称 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="data" class="col-sm-2 control-label">支付数据 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="data" name="data" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="min_quota" class="col-sm-2 control-label">最小限额</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="min_quota" name="min_quota" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="max_quota" class="col-sm-2 control-label">最大限额</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="max_quota" name="max_quota" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">状态 <strong style="color: red">*</strong></label>
                            <div class="col-sm-7">
                                <label><input type="radio" name="status"  value="0" />下线</label>
                                <label><input type="radio" name="status"  value="1" checked/>上线</label>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary submit-form-sync">提交</button>
                                &nbsp;<a href="{{ route('member.index') }}" class="btn btn-info">返回</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section><!-- /.content -->
@endsection
