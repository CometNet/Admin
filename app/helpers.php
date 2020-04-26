<?php
/**
 * 返回成功请求
 *
 * @param string $data
 * @param string $msg
 * @param string $header
 * @param string $value
 * @return mixed
 */
function responseSuccess($data = '', $msg = '成功', $url = '', $header = 'Content-Type', $value = 'application/json')
{
    $msg = is_array($msg)?json_encode($msg):json_encode([$msg?:trans('response.success')]);
    $res['status']  = ['errorCode' => 0, 'msg' => trans($msg)?trans($msg):$msg];
    $res['data']    = $data;
    $res['url']     = $url;
    return response($content = $res, $status = 200)->header($header, $value);
}

/**
 * 返回错误的请求
 *
 * @param string $msg
 * @param int $code
 * @param string $data
 * @param string $header
 * @param string $value
 * @return mixed
 */
function responseWrong($msg = '失败',  $data = '', $url = '', $code = 1, $header = 'Content-Type', $value = 'application/json')
{
    $msg = is_array($msg)?json_encode($msg):json_encode([$msg?:trans('response.fail')]);
    $res['status']  = ['errorCode' => $code, 'msg' => trans($msg)?trans($msg):$msg];
    $res['data']    = $data;
    $res['url']  = $url;
    return response($content = $res, $status = 200)->header($header, $value);
}

/**
 * 成功跳转
 * @param string $msg
 * @param string $route
 * @return \Illuminate\Http\RedirectResponse
 */
function respS($msg = '', $route = '')
{
    $msg = trans($msg)?trans($msg):trans('res.success');
    return $route?redirect($route)->with('msg_ok', $msg):redirect()->back()->with('msg_ok', $msg);
}

/**
 * 失败跳转
 * @param string $msg
 * @param string $route
 * @return \Illuminate\Http\RedirectResponse
 */
function respF($msg = '', $route = '')
{
    $msg = trans($msg)?trans($msg):trans('res.fail');
    return $route?redirect($route)->with('msg_no', $msg):redirect()->back()->with('msg_no', $msg);
}
