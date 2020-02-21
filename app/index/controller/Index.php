<?php
declare (strict_types = 1);

namespace app\index\controller;

use app\common\model\Code;

class Index
{
    public function index()
    {
    	$app = new \atk4\ui\App('My First App');       // 3
		$app->initLayout('Centered');                  // 4

		$app->add('广场');
        // return '您好！这是一个[index]示例应用';
    }

    public function login(){

    }

    public function logout(){

    }

    public function reg(){

    }
}

