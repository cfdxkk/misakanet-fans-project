<?php 
	//利用 explode 函数分割字符串到数组 
	$source = $_POST["ImageIDstring"];//按逗号分离字符串 
	$ImageID = explode(',',$source); 

	for($index=0;$index<count($ImageID);$index++){ 
		//提示语句
		echo $ImageID[$index]."号";
	} 







	





	$servername = "localhost:3308";
	  $username = "backGroundImageControler";
	  $password = "003ThReEzhitaige~";
	  $dbname = "misakanet";
			 
			
	  // 创建连接
	  $conn = new mysqli($servername, $username, $password, $dbname);
	   
	  // 检测连接
	  if ($conn->connect_error) {
	      die("连接失败: " . $conn->connect_error);
	  }
	   
	  // 预处理及绑定
	  $stmt = $conn->prepare("DELETE FROM background_image WHERE bgimageid = ? ");
	  $stmt->bind_param("i",  $imgID);
	   
	  // 设置参数并循环执行
	  for($index=0;$index<count($ImageID);$index++){
	  	$imgID = $ImageID[$index];
	  	$stmt->execute();
	  } 
	  
	  
	  echo "图片已移除";
	   
	  $stmt->close();
	  $conn->close();
	
	
	
	
	
	
	
	
	
	
	
	
?>