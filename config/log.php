<?php

// +----------------------------------------------------------------------
// | 日志设置
// +----------------------------------------------------------------------
return [
    // 默认日志记录通道
    'default'      => env('log.channel', 'file'),
    // 日志记录级别
    'level'        => [],
    // 日志类型记录的通道 ['error'=>'email',...]
    'type_channel' => [],
    // 关闭全局日志写入
    'close'        => false,
    // 全局日志处理 支持闭包
    'processor'    => null,
 	'type_channel' => ['error'=>'ding',],
    // 日志通道列表
    'channels'     => [
        'file' => [
            // 日志记录方式
            'type'           => 'File',
            // 日志保存目录
            'path'           => '',
            // 单文件日志写入
            'single'         => false,
            // 独立日志级别
            'apart_level'    => [],
            // 最大日志文件数量
            'max_files'      => 0,
            // 使用JSON格式记录
            'json'           => false,
            // 日志处理
            'processor'      => null,
            // 关闭通道日志写入
            'close'          => false,
            // 日志输出格式化
            'format'         => '[%s][%s] %s',
            // 是否实时写入
            'realtime_write' => false,
        ],
        // 其它日志通道配置

        'ding' => [
            // 日志记录方式
            'type'           => '\\bingher\\ding\\DingLog',
            'webhook' => 'https://oapi.dingtalk.com/robot/send?access_token=0a5ac696c7b3b3a202c13d6ba2721792be6b2ab4d1235240891d970d57248ca9', //你申请的钉钉机器人api
            'at' => [], //接收人手机号
        ],

  //       array(5) {
		//   ["errcode"] => int(0)
		//   ["errmsg"] => string(2) "ok"
		//   ["chatid"] => string(36) "chat855fcd78fef47d2900d557b1e5a1d507"
		//   ["openConversationId"] => string(27) "cid+MbjpS0YlKU9Y7N1GqcShA=="
		//   ["conversationTag"] => int(2)
		// }
    ],

];
