<?php
// 应用公共文件
//

if (!function_exists('get_client_ip')) {
    /**
     * 获取客户端IP地址
     * @param int $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param bool $adv 是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    function get_client_ip($type = 0, $adv = false) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($adv){
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos    =   array_search('unknown',$arr);
                if(false !== $pos) unset($arr[$pos]);
                $ip     =   trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip     =   $_SERVER['REMOTE_ADDR'];
            }
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
}

function is_online(){
	return 1;
}

function ptrace($msg, $at =[]){
	$text = is_string($msg) ? $msg : '`' . print_r($msg, true) . '`';
	$env = is_online()? '线上':'本地';

	if(PHP_SAPI == 'cli'){
		$content = "Log:【{$env}】 ".\think\facade\Request::url(true) . PHP_EOL .date('Y-m-d H:i:s').PHP_EOL. $text;
	}else{
	    $content = sprintf("Log:【%s】ip: %s", $env, get_client_ip(0,true)).'Snippet' . PHP_EOL . date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']) . ' ' . $_SERVER['SERVER_PROTOCOL'] . ' ' . $_SERVER['REQUEST_METHOD'] . ' : ' . \think\facade\Request::url(true) . PHP_EOL . $text;
	}
	$webhook = config('log.channels.ding.webhook');
	$ding = new \bingher\ding\DingBot([
		'webhook'=>$webhook
	]);
	if($at){
		$ding = $ding->at($at);
	}
	return $res = $ding->text($content);
}
