
<?php
	
	//判断是否有提交
	if(!$posts = $_POST){
		// require "php/bgImgConsole/bgImgConsolerLogin.php";
		header('Location: bgImgConsolerLogin.php');
		exit;
	}
	
	
	
	
	//  清除一些空白符号
	foreach ($posts as $key => $value) {
	    $posts[$key] = trim($value);
	}
	$username = null;
	$password = null;
	
	$username = $posts["email"];
	// $password = md5($posts["password"]);
	$password = $posts["password"];
	
	
	if($password == null || $username == null){
		echo "<script>alert('帐号或密码不能为空')</script>";
		require "bgImgConsolerLogin.php";		
		exit;
	}
	
	
	$servername = "localhost:3308";
	$DBusername = "temporaryROOT";
	$DBpassword = "thissipassword";
	$dbname = "misakanet";
	
	
	
	
	// 创建连接
	$conn = new mysqli($servername, $DBusername, $DBpassword, $dbname);
	
	// 检测连接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	
	// 预处理及绑定
	$stmt = $conn->prepare("SELECT flag FROM user_test where email = ? AND password = ?");
	$stmt->bind_param("ss",$uusername,$upassword);
	$uusername = $username;
	$upassword = $password;
	$stmt->bind_result($result1);
	
	if($stmt->execute()){
		//do noting
	}else{
	    echo '<br> 执行失败：' . $mysqli->error;
	}
	
	
	
	if(!$stmt->fetch()){ //根据用户名和密码查询不到flag
	       echo "没有该用户或用户名密码错误";
	    }else{
			
			
			
		//  当验证通过后，启动 Session
		session_start();
		//  注册登陆成功的 flag 变量，并赋值 
		switch ($result1){
			case 0:
				$conn->close();
				$_SESSION["flag"] = 0;
				// require '../../bgImgConsolePad.php';
				header('Location: ../../bgImgConsolePad.php');
				break;
			case 1:
				$conn->close();
				$_SESSION["flag"] = 1;
				// require '../../bgImgConsolePad.php';
				header('Location: ../../bgImgConsolePad.php');
				break;
			case 2:
				$conn->close();
				$_SESSION["flag"] = 2;
				// require '../../bgImgConsolePad.php';
				header('Location: ../../bgImgConsolePad.php');
				break;
			default:
				$conn->close();
				$_SESSION["flag"] = 2;
				// require '../../bgImgConsolePad.php';
				header('Location: ../../bgImgConsolePad.php');
		}
		exit;
	} 
	
	
	
?>