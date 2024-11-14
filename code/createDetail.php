	<?php

/*
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

*/


/*

https://v.ballbang.co/code/createDetail.php?page=data&id=retro-bowl

cd  /var/www/code/html/code;
php createDetail.php




*/
// echo $gameName; die;

require("config.php");
require("gameArray.php");
$page='data';

	foreach ($allGame as $gameId => $value) {
		$htmlList=file_get_contents("$githubPage/htmlGameList.html");

		$ranNum=rand(count($Popular)/2,count($Popular));		
		$similar=array_rand($Popular,$ranNum);
		shuffle($similar);
		// print_r($gameId); die;	
		



		$similar=array_unique($similar);
		$html_list="";
		$n=0;
		foreach ($similar as $key => $value) {
			$value=trim($value); 
			$n++;
			// echo $value.'<br/>'; die;
			if(!array_key_exists($value,$allGame)){continue;}
			
			$data_new=str_replace('imgLink', $allGame[$value]['imgLink'], $htmlList);
			$data_new=str_replace('gameName', $allGame[$value]['gameName'], $data_new);
			$data_new=str_replace('gameId', $allGame[$value]['gameId'], $data_new);

			$gameCategory=$allGame[$value]['gameCategory'];
			$gameCategory=explode(',', $gameCategory);
			$gameCategory=trim($gameCategory[0]);
			// echo $gameCategory; die; 
			$data_new=str_replace('gameCategory', $gameCategory, $data_new);
			// echo $data_new;

			$html_list=$html_list."\n".$data_new;


			// die;

			// if($n==$catGameNumbers){break;}


		}





		// echo $html_list; die;




	
	$gameLink=$allGame["$gameId"]['gameLink'];
	$imgLink=$allGame["$gameId"]['imgLink'];
	$gameCategory=$allGame["$gameId"]['gameCategory'];
	$gameName=$allGame["$gameId"]['gameName'];
	

	$metaTitle="$gameName";
	$pageName=ucfirst($githubPage);

	// echo $gameId; die;

	$detailHtml=file_get_contents("$page/detail.html");
	$detailHtml=str_replace('metaTitle', $metaTitle, $detailHtml);
	$detailHtml=str_replace('gameLink', $gameLink, $detailHtml);
	$detailHtml=str_replace('gameName', $gameName, $detailHtml);
	$detailHtml=str_replace('xxx', $siteName, $detailHtml);
	$detailHtml=str_replace('siteName', $siteName, $detailHtml);
	$detailHtml=str_replace('htmlList_Here', $html_list, $detailHtml);
	$detailHtml=str_replace('gameId', $gameId, $detailHtml);
	$detailHtml=str_replace('imgLink', $imgLink, $detailHtml);
	// echo "<br/> xxx ====================================== <br/>"; 
	// echo $detailHtml; die;
	$gameId=$allGame["$gameId"]['gameId'];
if($gameId=="retro-bowl"or$gameId=="bitlife"or$gameId=="subway-surfers"or$gameId=="subway-surfers-bejing"or$gameId=="bitlife"or$gameId=="subway-surfers-newyork"or$gameId=="subway-surfers-houston"or$gameId=="subway-surfers-monaco"or$gameId=="drive-mad"or$gameId=="crossy-road"or$gameId=="monkey-mart"or$gameId=="tunnel-rush"or$gameId=="temple-run-2"or$gameId=="stickman-hook"or$gameId=="eaglercraft"or$gameId=="tank-trouble"or$gameId=="raft-wars-2"or$gameId=="raft-wars"or$gameId=="stick-merge"or$gameId=="tunnel-rush-2"or$gameId=="temple-of-boom"or$gameId=="apple-knight"or$gameId=="dreadhead-parkour"or$gameId=="blumgi-rocket"or$gameId=="monster-tracks"or$gameId=="sausage-flip"or$gameId=="blockpost"or$gameId=="blockpost"or$gameId=="mad-gunz"or$gameId=="combat-online"or$gameId=="stick-defenders"or$gameId=="cow-bay"or$gameId=="stacktris"or$gameId=="brain-test-3-tricky-quests"or$gameId=="blumgi-ball"or$gameId=="gobble"or$gameId=="blumgi-slime"or$gameId=="parkour-race"or$gameId=="brain-test-tricky-puzzles"or$gameId=="soccer-skills-world-cup"or$gameId=="blumgi-castle"or$gameId=="thumb-fighter-christmas"or$gameId=="soccer-skills-euro-cup"or$gameId=="subway-surfers-beijing")
	{
	$detailHtml=str_replace('#website','noindex,nofollow', $detailHtml);
		}







	file_put_contents("../$siteName/play/$gameId.html", $detailHtml);







	}









?>