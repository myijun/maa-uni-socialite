### 微信小程序登录获取到code
```php
<?php
$config = new \Myj\UniSocialite\AppConfig();
$config->setAPPID('appid')->setAPPSecret('appsecret')->setSessionKey('session_key');
\Myj\UniSocialite\UniSocialite::driver(\Myj\UniSocialite\Drivers\Wechat\Wechat::class, $config)->witch(['code' => ''])->login();
```
### 微信小程序登录后进行用户信息绑定注册
```php
<?php
$args = [];
\Myj\UniSocialite\UniSocialite::driver(\Myj\UniSocialite\Drivers\Wechat\Wechat::class, $config)->witch
(\Myj\UniSocialite\Drivers\Wechat\Wechat::registerWitch(...$args))->register();
```