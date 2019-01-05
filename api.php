<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");

$gameConfig = [
	['name' => 'fish',
	 'path' => 'fish', 
	 'alias' => '触玩捕鱼',	
	 'host' =>'https://h5-ddz.hztangyou.com/',
	 'mainJs'=> 'main.min.js',
	 'gameId'=>5,
	 'listenAllProto'=>true,
	 'entryClassName' =>"FishMain"],

	 ['name' => 'pdk',
	 'path' => 'pdk', 
	 'alias' => '跑得快',	
	 'host' =>'https://h5-ddz.hztangyou.com/',
	 'mainJs'=> 'main.min.js',
	 'gameId'=>9,
	 'listenAllProto'=>true,
	 'landscape'=>true,
	 'designWidth'=>1280,
	 'designHeight'=>640,
	 'entryClassName' =>"RunFastMain"],

	 ['name' => 'chickencompare',
	 'path' => 'chickencompare', 
	 'alias' => '比鸡',	
	 'host' =>'https://h5-ddz.hztangyou.com/',
	 'mainJs'=> 'main.min.js',
	 'gameId'=>10,
	 'listenAllProto'=>true,
	 'landscape'=>true,
	 'designWidth'=>1280,
	 'designHeight'=>640,
	 'entryClassName' =>"CCMain"],

	['name' => 'doudizhu', 'path' => 'doudizhu', 'alias' => '好手气斗地主'],
	['name' => 'showhand', 'path' => 'showhand', 'alias' => '港式五张', 'hidden' => true],
	['name' => 'buyu', 'path' => 'buyu', 'alias' => '捕鱼', 'hidden' => true],
	['name' => 'zjh', 'path' => 'zjh', 'alias' => '扎金花', 'hidden' => true],
];

function getGames()
{
	global $gameConfig;

	$result = [];
	$games = [];
	foreach ($gameConfig as $item) {
		$hidden = isset($item['hidden']) ? $item['hidden'] : false;
		if (!$hidden) {
			array_push($games, $item);
		}
	}

	$result = [
		'code' => 0,
		'data' => $games,
	];

	echo json_encode($result);
}

function getGameByName()
{
	$result = [];
	if (isset($_GET['name'])) {
		$name = $_GET['name'];

		global $gameConfig;

		$game = null;
		foreach ($gameConfig as $item) {
			$hidden = isset($item['hidden']) ? $item['hidden'] : false;
			if (!$hidden && $item['name'] == $name) {
				$game = $item;
				break;
			}
		}
		if ($game) {
			$gamePath = 'games/' . $game['path'];

			$folds = [];
			$webPath = dir($gamePath . '/web');
			while ($fold = $webPath->read()) {
				$path = $gamePath . '/web/' . $fold;
				if (is_dir($path) && $fold != '.' && $fold != '..') {
					array_push($folds, $fold);
				}
			}

			usort($folds, 'strcmp');
			$lastVersion = end($folds);

			$url = "$gamePath/web/$lastVersion/";
			$game['url'] = $url;

			$result = [
				'code' => 0,
				'data' => $game,
			];
		} else {
			$result = [
				'code' => 2,
				'data' => null,
			];
		}
	} else {
		$result = [
			'code' => 1,
			'data' => null,
		];
	}

	echo json_encode($result);
}


if (isset($_GET['action'])) {
	$action = $_GET['action'];

	if (function_exists($action)) {
		$action();
	}
}