<?php
$numOfIpaddress = trim(fgets(STDIN));
//IPアドレスの正規表現
//"."もエスケープしないといけない
$regex = '/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';

//正規表現でIPアドレスに一致しているかチェック
for ($i = 0; $i < $numOfIpaddress; $i++) {
	$ipaddress = trim(fgets(STDIN));
	if(preg_match($regex, $ipaddress)) {
		echo "True";
	} else {
		echo "False";
	}
	echo "\n";
}
