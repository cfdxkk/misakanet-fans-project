<?php
	//  防止全局变量造成安全隐患
	$flag = 2;
	
	//  启动会话，这步必不可少
	session_start();
	unset($_SESSION['flag']);	//销毁session
	header('Location: bgImgConsolerLogin.php');
?>