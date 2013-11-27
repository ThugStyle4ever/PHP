<?php
	//定義ファイルの読み込み	defoult.php
	require_once('default.php');
	//MySQLに接続＋データベース選択＋文字コード指定
	require_once('dbconnect.php');
	// $conn = mysql_connect(HOST,USER,PASS) or die(mysql_error());
	// mysql_select_db(DB,$conn) or die(mysql_error());
	// mysql_query('SET NAMES UTF8', $conn);
	//SQL文の作成(新規追加)
	$query_in = 'INSERT INTO my_items SET makers_id = %d,item_name = "%s",price = %d,keyword = "%s",sales = %d';
	$query_in = sprintf($query_in,
											mysql_real_escape_string($_POST['makers_id']),
											mysql_real_escape_string($_POST['item_name']),
											mysql_real_escape_string($_POST['price']),
											mysql_real_escape_string($_POST['keyword']),
											mysql_real_escape_string($_POST['sales'])
											);
	//SQLを発行
	$result = mysql_query($query_in,$conn) or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>MySQL+DB</title>
	</head>

	<body>
		<div id="wrap">
			<div id="head">
				<h1>商品登録</h1>
			</div>

			<div id="content">
				<p>商品を登録しました。</p>
				<?php

				?>
			</div>

			<div id="foot">
			</div>

		</div>
	</body>
</html>
