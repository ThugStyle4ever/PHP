<?php
	//定義ファイルの読み込み	defoult.php
	require_once('default.php');
	//MySQLに接続＋データベース選択＋文字コード指定
	$conn = mysql_connect(HOST,USER,PASS) or die(mysql_error());
	mysql_select_db(DB,$conn) or die(mysql_error());
	mysql_query('SET NAMES UTF8', $conn);
?>
