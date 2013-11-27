<?php
	//定義ファイルの読み込み	defoult.php
	require_once('default.php');
	//MySQLに接続＋データベース選択＋文字コード指定
	require_once('dbconnect.php');

	//MySQLに接続＋データベース選択＋文字コード指定
	$conn = mysql_connect(HOST,USER,PASS) or die(mysql_error());
	mysql_select_db(DB,$conn) or die(mysql_error());
	mysql_query('SET NAMES UTF8', $conn);
	$query_se = 'select * from makers;';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<title>商品登録</title>
	</head>

	<body>
		<div id="wrap">
			<div id="head">
				<h1>商品登録</h1>
			</div>

			<div id="content">
				<p>登録する商品の情報を記入してください。</p>
				<form id="frmInput" name="frmInput" method="post" action="input_do.php">
				  <dl>
					  <dt>
					    <label for="makers_id">生産者</label>
					  </dt>
					  <dd>
					    <select name="makers_id" id="makers_id">
					    	<option value="">選択してください</option>
					  		<!-- <option value="1" name="">山田さん</option> -->
					    	<!-- <option value="2" name="">齋藤さん</option> -->
					    	<!-- <option value="3" name="">川上さん</option> -->
					    	<!-- <option value="4" name="">澤田さん</option> -->
					  <?php
					  	$recordSet = mysql_query($query_se,$conn) or die(mysql_error());
								while($data = mysql_fetch_assoc($recordSet)){
						?>
								<option value="<?= data['id'] ?>"><?= $data['name'] ?></option>
						<?php
							}
					  ?>
					  	</select>
					  </dd>
					  <dt>
					    <label for="item_name">商品名</label>
					  </dt>
					  <dd>
					    <input name="item_name" type="text" id="item_name" size="35" maxlength="255" />
					  </dd>
					  <dt>
					    <label for="price">価格</label>
					  </dt>
					  <dd>
					    <input name="price" type="text" id="price" size="10" maxlength="10" />円
						</dd>
					  <dt>
					  	<label for="sales">個数</label>
					  </dt>
					  <dd>
					    <input name="sales" type="text" id="sales" size="10" maxlength="10" />個
					  </dd>
					  <dt>
					    <label for="keyword">キーワード</label>
					  </dt>

					  <dd>
					    <input name="keyword" type="text" id="keyword" size="50" maxlength="255" />
					  </dd>
					</dl>
					  <input type="submit" value="登録する" />
				</form>
			</div>

			<div id="foot">
			</div>

		</div>
	</body>
</html>
