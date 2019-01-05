<?php
/**
 * Created by IntelliJ IDEA.
 * User: rockyl
 * Date: 16/7/11
 * Time: 下午2:51
 */

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");

$serverId = 0;

switch ($serverId){
	case 0:
		$serverConfig = [
			'WEB_SERVICE_URL' => 'https://wx-p.hztangyou.com/',
			'RESOURCE_URL' => 'https://h5-ddz.hztangyou.com/',
			//'REPORT_URL' => 'http://pl.ddz.htgames.cn:18866/_.gif',
			'WX_LOGIN_URL' => 'https://h5-ddz.hztangyou.com/wx',

			'RECHARGE_URL' => 'https://pay.exunsoul.com/index/pay?account=',
			'REGISTER_URL' => 'https://reg.gamebode.com/regist.html',
			'PASSWORD_URL' => 'https://reg.gamebode.com/motify.html',
			'HOME_PAGE_URL' => 'https://reg.gamebode.com/index.html',
			'DOWNLOAD_PAGE_URL' => 'https://h5.ddz.htgames.cn/download',
		];
		break;
	case 1:
		$serverConfig = [
			'WEB_SERVICE_URL' => 'http://h5-ddz.hztangyou.com/',
			'RESOURCE_URL' => 'http://www.htgames.cn/zhanghaichuan/mobile/',
			//'REPORT_URL' => 'http://pl.doudizhu.htgames.cn:18866/_.gif',
			'WX_LOGIN_URL' => 'http://www.htgames.cn/zhanghaichuan',

			'RECHARGE_URL' => 'http://pay.exunsoul.com:8998/index/pay?account=',
			'REGISTER_URL' => 'http://reg.gamebode.com/regist.html',
			'PASSWORD_URL' => 'http://reg.gamebode.com/motify.html',
			'HOME_PAGE_URL' => 'http://reg.gamebode.com/index.html',
			'DOWNLOAD_PAGE_URL' => 'http://www.htgames.cn/zhanghaichuan/mobile/download',
		];
		break;
}

echo json_encode($serverConfig);
