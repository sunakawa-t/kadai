<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<?php use Fuel\Core\Asset;echo Asset::js("kadai.js"); ?>
	</head>
	<form action="kadai" method="POST">
		<p> 名前検索:<input type = "text" name = "name" id = "name"></p>
		<p> 年齢検索:<input type = "text" name = "age" id = "age">
		<input type = "submit" onclick = "search()" value = '検索'></p>
	</form>
	<form action="update" method="POST">
	<table>
		<tr><th><input type = "submit" name = "insert" value = '追加'></th>
		<th><input type = "submit"  name = "update" value = '変更'></th>
		<th><input type = "submit" name = "delite" value = '削除'></th></tr>
	</table>
		<p>登録・変更・削除<br/>
    	 ＩＤ：<input type = "text" name = "id" id = "id"><br/>
    	 名前：<input type = "text" name = "nameu" id = "nameu"><br/>
    	 年齢：<input type = "text" name = "ageu" id = "ageu"><br/>
    	 日時：<input type = "text" name = "registry_datetime" id = "registry_datetime"></p>
	</form>
	<?php echo "<table border='1'>";
		echo "<tr style=background-color:#DBFF71;><th>ＩＤ</th><th>名前</th><th>年齢</th><th>レジストリ日時</th><th></th></tr>";
		 foreach($test as $aaa){
			echo "<tr><td>".$aaa['id']."</td>";
			echo "<td>".$aaa['name']."</td>";
			echo "<td>".$aaa['age']."</td>";
			echo "<td>".$aaa['registry_datetime']."</td>";
			echo "<form action=update method=POST>";
			echo "<td><input type = submit name = delete2 id = delete2 value=削除></td>";
			echo "</form></tr>";
		 }
		 echo "</table>" ?>
</html>