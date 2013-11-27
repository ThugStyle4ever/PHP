<?php
	//定義ファイルの読み込み	defoult.php
	require_once('default.php');
	//MySQLに接続＋データベース選択＋文字コード指定
	require_once('dbconnect.php');
	//MySQLに接続
	// $conn = mysql_connect(HOST,USER,PASS) or die(mysql_error());
	// echo 'データベースに接続しました';
	// mysql_db(DB,$conn) or die(mysql_errno());
	// mysql_select_db(DB,$conn) or die(mysql_error());
	// echo '<br />データベーススペース['.DB.']を選択しました。';
	// mysql_query('SET NAMES UTF8', $conn);
	// SQL文の作成と発行
	// $query_in = 'insert into my_items set makers_id=1,item_name="もも",price=210,keyword="缶詰,ピンク,甘い",sales=0,created=NOW(),modified=NOW()';
	// $query_up = 'update my_items set makers_id=4,sales=30 where id=9';
	// $query_dl = 'delete from my_items where id=6';
	if(!empty($_GET['page'])) {
		$page = $_GET['page'];
		}else{
			$page = 1;
		}

		$page = max($page , 1);

		// 最終ページを取得する
		$sql = 'SELECT count(*) AS cnt from my_items';
		$recordSet = mysql_query($sql);
		$table = mysql_fetch_assoc($recordSet);
		$maxPage = ceil($table['cnt'] / 5);
		$page = min($page,$maxPage);

		$start = ($page - 1) * 5;
		$recordSet = mysql_query(query);
	// $query_se = 'select * from my_items order by id desc';
	// $query_se = 'SELECT m.name, i.* FROM makers m,my_items i';
	// $query_se .= 'WHERE m.id=i.makers_id';
	// $query_se .= 'ORDER by i.id DESC';
	// $recordSet = mysql_query($query_se,$conn) or die(mysql_error());
	$recordSet = mysql_query('SELECT m.name, i.* FROM makers m,my_items i WHERE m.id=i.makers_id ORDER by i.id DESC LIMIT '. $start .' ,5');

	// $data = mysql_fetch_assoc($recordSet);

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
				<h1>DB+MySQL</h1>
			</div>

			<div id="content">
				<?= $maxPage ?>ページ中<?= $page ?>ページ
				<table width="100%">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">メーカー</th>
						<th scope="col">商品名</th>
						<th scope="col">価格</th>
					</tr>
					<tr>
					<?php
					while($table = mysql_fetch_assoc($recordSet)) {
					?>
						<td><?= htmlspecialchars($table['id']); ?></td>
						<td><?= htmlspecialchars($table['name']); ?></td>
						<td><?= htmlspecialchars($table['item_name']); ?></td>
						<td><?= htmlspecialchars($table['price']); ?></td>
					</tr>
					<?php
					}
					?>
				</table>
				<ul class="paging">
					<?php
					if($page > 1) {
					?>
					<li><a href="index.php?page=<?= ($page-1) ?>">前のページヘ</a></li>
					<?php
					}else{
					?>
					<li>前のページヘ</li>
					<?php
					}
					?>
					<?php
					if($page < $maxPage) {
					?>
					<li><a href="index.php?page=<?= ($page+1) ?>">次のページヘ</a></li>
					<?php
					}else{
					?>
					<li>次のページヘ</li>
					<?php
					}
					?>
				</ul>
				<?php
					while($data = mysql_fetch_assoc($recordSet)){
						echo $data['id'],$data['item_name'].'<br />';
					}
					// print_r($data);
					// echo $data['item_name'];
				?>

			</div>

			<div id="foot">
			</div>

		</div>
	</body>
</html>
