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
		'com.tangyou.doudizhu'=>[
    		'10000' => [
    			'channel' => 'official',
    			'version' => 2,
				'url1' => 'https://h5-cdn.oss-cn-hangzhou.aliyuncs.com/ddz/hsqddz_20180417_10000.apk',
				'url' => 'https://h5-ddz.hztangyou.com/2018-07-17_v1.0.3_10000_release.apk',
				'md5' => 'a37bdfbb296b50c45d910016c95a40c0',
    		],
			'10001' => [
    			'channel' => 'official',
    			'version' => 2,
				'url1' => 'https://h5-cdn.oss-cn-hangzhou.aliyuncs.com/ddz/hsqddz_20180417_10000.apk',
				'url' => 'https://h5-cdn.oss-cn-hangzhou.aliyuncs.com/ddz/hsqddz_20180417_10000.apk',
				'md5' => 'eada4ce457fbf5291d440ac375ac6424',
    		],
    		'10002' => [
    			'channel' => 'official',
    			'version' => 2,
				'url1' => 'https://h5-cdn.oss-cn-hangzhou.aliyuncs.com/ddz/hsqddz_20180417_10000.apk',
				'url' => 'https://h5-cdn.oss-cn-hangzhou.aliyuncs.com/ddz/hsqddz_20180417_10000.apk',
				'md5' => 'a37bdfbb296b50c45d910016c95a40c0',
    		],
		]
	],
	'iOS' => [
		'com.tangyou.doudizhu'=>[
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