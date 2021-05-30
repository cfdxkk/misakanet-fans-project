<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<!-- input_css -->
		<link rel="stylesheet" type="text/css" href="./css/backgroundimage.css"/>
		<!-- input_jQuary_firse -->
		<script src="./js/jquery2.1.4.js" type="text/javascript"></script>
		<!-- input_javascript -->
		<script src="./js/backgroundimg.js" type="text/javascript" charset="utf-8"></script>

		<title>misakanet - hello</title>
	</head>
	<body>
		
		<div id="banner">
			
			<?php
			
			
			$servername = "localhost:3308";
			  $username = "backGroundImageChecker";
			  $password = "CODE001(daoragong)";
			  $dbname = "misakanet";
					 
					
			  // 创建连接
			  $conn = new mysqli($servername, $username, $password, $dbname);
			  // $conn = new mysqli("localhost:3308","root", "88zxcvbnm88", $dbname);  //注意数据库端口问题
					 
			  // 检测连接
			  if ($conn->connect_error) {
				die("连接失败: " . $conn->connect_error);
			  }
					 
			  $sql = "SELECT imageURL FROM background_image WHERE displayOrNot != 0";
			  $result = $conn->query($sql);
			   
			  if ($result->num_rows > 0) {
			      // 输出数据
			      while($row = $result->fetch_assoc()) {
					  echo "
						<div class='backGroundImage' style='background: url("."http://127.0.0.1/myphp/misakanet_fans_proj".substr($row["imageURL"], 2).") center center no-repeat;	background-size: cover;'></div>
						";
					  
			      }
			  } else {
			      echo "<td colspan='4'>数据库中没有背景图，请先上传</td>";
			  }
			echo "	
					</tbody>
				</table>
			";
			$conn->close();
			
			
			
			?>
			
			
			
			
			
			<!-- <div class="backGroundImage" style="background: url(img/backgroundimage/1.png) center center no-repeat;	background-size: cover;"></div>
			<div class="backGroundImage" style="background: url(img/backgroundimage/2.png) center center no-repeat;	background-size: cover;"></div>
			<div class="backGroundImage" style="background: url(img/backgroundimage/3.png) center center no-repeat;	background-size: cover;"></div> -->
		</div>
		
		<div id="mask"> <!-- 当背景图片没有加载完成时的遮罩 -->
			<h1>加载中</h1>
		</div>
	</body>
</html>
