@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">游戏记录</h3>
            </div>
            <div class="panel-body">

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>账号</th>
                        {{--<th style="width: 20%">平台账号</th>--}}
                        <th style="width: 10%">游戏类别</th>
                        <th style="width: 10%">输赢情况</th>
                        <th style="width: 10%">下注金额</th>
                        <th style="width: 20%">下注时间</th>
                    </tr>

                    <tfoot>
                    <tr>
                        <td><strong style="color: red">总合计</strong></td>
                        <td colspan="2"></td>

                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">

                    </div>
                    <div class="pull-right" style="margin: 0;">
                        </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">不通过原因</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-horizontal" id="updateReason">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="put">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fail_reason" class="col-sm-3 control-label"><span style="color: red">不通过原因</span></label>
                                <div class="col-sm-8">
                                    <textarea name="fail_reason" id="fail_reason" rows="3" required class="form-control"></textarea>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info btn-flat">提交</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showRemark(e)
        {
            var uri = $(e).attr('data-uri');
            $('#updateReason').attr('action',uri)
            $('#myModal').modal('show');
        }
    </script>
@endsection
