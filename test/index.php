<?php
require __DIR__ . '/../vendor/autoload.php';

$config = new \Myj\UniSocialite\AppConfig();
$config->setAPPID('appid')->setAPPSecret('appsecret')->setSessionKey('session_key');
\Myj\UniSocialite\UniSocialite::driver(\Myj\UniSocialite\Drivers\Wechat\Wechat::class, $config)->witch(['code' => ''])->login();
//
$args = [];
\Myj\UniSocialite\UniSocialite::driver(\Myj\UniSocialite\Drivers\Wechat\Wechat::class, $config)->witch
(\Myj\UniSocialite\Drivers\Wechat\Wechat::registerWitch(...$args))->register();