<?php
	$localPart = fgets(STDIN);
	$domain = fgets(STDIN);
	//2つの文字列をメールアドレスに変換
	$mailAdress = $localPart ."@". $domain;
	//改行コードの削除
	$mailAdress = str_replace(array("\r\n" , "\n", "\r"), '', $mailAdress);
	echo $mailAdress;
