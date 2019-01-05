<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json");

if (isset($_GET['items'])) {
	$items = explode(',', $_GET['items']);
} else {
	$items = ['game', 'goods', 'match', 'recharge', 'custom', 'mission', 'personalgame', 'red_coin_goods','red_coin_exchange', 'cards_recorder_buy_option', 'game_prop', 'day_task', 'dbs_config', 'testers','rid2gt', 'challengerooms','activity_config','red_coin_lottery_config','item_drop','drawcard_conf', 'free_texasholdem_config','vip_config','friends_cfg'];
}

$result = [];
foreach ($items as $item) {
	switch ($item) {
		case 'game':
			$game = null;
			if (isset($_GET['id'])) {
				$id = intval($_GET['id']);
				$allGameConfigs = json_decode(file_get_contents('configs/room.json'));
				$game = $allGameConfigs;
				#foreach ($allGameConfigs as $gameItem){
				#	if($gameItem->gameID == $id){
				#		$game = $gameItem;
				#		break;
				#	}
				#}
			}

			if($game){
				$result[$item] = $game;
			}else{
				$result[$item] = 'error game id.';
			}
			break;
		default:
			$fileName = "configs/$item.json";
			$content = json_decode(file_get_contents($fileName));
			$result[$item] = $content;
			break;
	}
}

echo json_encode($result);
