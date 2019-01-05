<?php
/**
 * Created by IntelliJ IDEA.
 * User: rockyl
 * Date: 16/2/22
 * Time: 上午9:30
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$configs = [
	'Android' =>[
		'com.tangyou.back'=>[
    		'10000' => [
    			'channel' => 'official',
    			'version' => 3,
				'url' => 'https://h5-ddz.hztangyou.com/1.0.3.apk',
				'md5' => 'f9483691c46a805df3ee689c6fba6388',
				'landscape'=>false,
				'fullscreen'=>false,
				'gameVer' => 100003,
				'gameUrl' =>'https://www.szxlsolar.com/tp/public/tg/login/index'
    		],
			'10001' => [
    			'channel' => 'official',
    			'version' => 1,
    			'url' => 'https://cdn.hztangyou.com/hsqddz_10001_20171124.apk',
    		],
    		'10002' => [
    			'channel' => 'official',
    			'version' => 1,
    			'url' => 'https://cdn.hztangyou.com/hsqddz_10002_20171124.apk',
    		],
		]
	],
	'iOS' => [
		'com.tangyou.back'=>[
			'20000'=>[
				'channel' => 'official',
				'version' => 1,
				'url' => 'itms-services://?action=download-manifest&amp;url=https://cdn.hztangyou.com/hsqddzv112.plist',
				// 'url' => 'itms-services://?action=download-manifest&amp;url=https://www.uu07.com/1/hsqddz.plist',
			]
		],
	]
];

if (isset($_POST['id']) && isset($_POST['platform']) && isset($_POST['channel'])) {
	$id = $_POST['id'];
	$platform = $_POST['platform'];
	$channelName = $_POST['channel'];

	if(isset($configs[$platform])){
		$config = $configs[$platform];
		if(isset($config[$id])){
			$config = $config[$id];
			if(isset($config[$channelName])){
				$channel = $config[$channelName];
				$response = [
					'code' => 0,
					'data' => $channel
				];
			}else{
				$response = [
					'code' => 4,
					'message' => 'error channel'
				];
			}
		}else{
			$response = [
				'code' => 3,
				'message' => 'error id'
			];
		}
	}else{
		$response = [
			'code' => 2,
			'message' => 'error platform'
		];
	}
} else {
	$response = [
		'code' => 1,
		'message' => 'error arguments'
	];
}

echo json_encode($response);