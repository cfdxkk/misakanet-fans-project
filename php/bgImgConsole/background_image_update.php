<?php


// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");

$temp = explode(".", $_FILES["file"]["name"]);

echo "文件的大小是：".$_FILES["file"]["size"] . "</br>";		//echo debug
echo "文件的类型是：".$_FILES["file"]["type"] . "</br>";		//echo debug

$extension = end($temp);     // 获取文件后缀名

echo "文件的后缀名是：".$extension."</br>";					//echo debug
if (
	(
		($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png")
	)
	&& in_array($extension, $allowedExts)
){
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
		if((
			$_FILES["file"]["size"] < 	1024*	1024*	32 )   
							// 	小于	b		kb		mb  
		){
			echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
			echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
			echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
			
			
			
			date_default_timezone_set('PRC');
			echo "现在的服务器时间是：".date('Y-m-d H:i:s', time())."</br>";
			$updatetime = date('YmdHis', time());
			$fileURL = "../../img/backgroundimage/" . $updatetime . "_" . $_FILES["file"]["name"];     //用一个下划线分割时间戳和处理过的图片原名
			$fileURL2 = "../../img/backgroundimage/" . $updatetime . "_" . $_FILES["file"]["name"];     //用一个下划线分割时间戳和处理过的图片原名
			
			
			
			
			echo "debug文件临时缓存" . $_FILES["file"]["tmp_name"];
			move_uploaded_file($_FILES["file"]["tmp_name"], $fileURL);   // 从缓存中复制文件至 ../img/backgroundimage/
			echo "文件存储在: " . $fileURL. "<br>";
			
			
// 下方开始php连接数据库部分  ————————————————————————————————————————————————————————————
			
			$servername = "localhost";
			$username = "backGroundImageChecker";
			$password = "CODE001(daoragong)";
			$dbname = "misakanet";
					 
					
			  // 创建连接
			  $conconn = new mysqli($servername, $username, $password, $dbname);
					 
			  // 检测连接
			  if ($conconn->connect_error) {
				die("连接失败: " . $conconn->connect_error);
			  }
					 
			
			  
			  
			  $sqlcon = "SELECT MAX(bgimageid) as imgCount FROM background_image";
			  $result = $conconn->query($sqlcon);
			   
			  if ($result->num_rows > 0) {
			      // 输出数据
			      while($row = $result->fetch_assoc()) {
			  					  $maxImgID = $row["imgCount"];
			  					  
			  					  echo "最大的的图片ID为" . $maxImgID. "<br>";
			  					  
			  					  
			      }
			  } else {
			      echo "<td colspan='4'>数据库中没有背景图，请先上传</td>";
			  }
			  
			  
			  $sqlfind = "SELECT bgimageid FROM background_image";
			  $result = $conconn->query($sqlfind);
			  if ($result->num_rows > 0) {
			      // 输出数据
				  $i = 0;
				  echo  "图片ID列表为：";
			      while($row = $result->fetch_assoc()) {
					  $i++;
					  echo $i."-".$row["bgimageid"] . ",";
					  $imgIdArray[$i] = $row["bgimageid"];
			      }
			  } else {
			      echo "<td colspan='4'>数据库中没有背景图，请先上传</td>";
			  }
			  
			  
			  // echo "3- ".$imgIdArray[3] . "<br>";
			  // echo "4- ".$imgIdArray[4] . "<br>";
			  // echo "5- ".$imgIdArray[5] . "<br>";
			  // echo "6- ".$imgIdArray[6] . "<br>";
			  
			  
			  $nextImgID = 0;    //插入点
			  $imgIdFlag = 0;
			  $numberFlag = 1;
			  echo  "图片ID数组为：";
			  for($numberFlag;$numberFlag<=$maxImgID;$numberFlag++){
				  $imgIdFlag++;
				  // echo $imgIdArray[$imgIdFlag];
				 echo $numberFlag." - ".$imgIdArray[$imgIdFlag] . ", ";
				  if($numberFlag != $imgIdArray[$imgIdFlag]){
					  echo "<br>在第 ".$numberFlag." - ".$imgIdArray[$imgIdFlag] . "发生插入点异常<br>";
					  $nextImgID = $numberFlag;
					  echo "最新的插入点是 ".$nextImgID . "<br>";
					  
					  break;
					  // echo "debug numberFlag here". $nextImgID ."<br>";
					  
					  // $imgIdArray[$imgIdFlag] = $imgIdArray[$imgIdFlag - 1];
					  
					  // echo "在第 " . $numberFlag . " 时内容与" . $imgIdArray[$imgIdFlag] ."不同";
				  }
				  
			  }
			  echo "<br>没有异常，本应顺次插入的插入点是 ".$imgIdFlag . "<br>";
			  if($imgIdFlag == $maxImgID){
				  echo "但插入点等于最大值，顺次插入至最后<br>";
				  $nextImgID = $imgIdFlag+1;
			  }
			  
			
			  
			
			  
			  
			echo "	
					</tbody>
				</table>
			";
			$conconn->close();
			
			
			
			
			
			
			
			
			
			
			
			$servername = "localhost";
			$username = "backGroundImageInserter";
			$password = "Alicization_002";
			$dbname = "misakanet";
					 
					
			// 创建连接
			$conn = new mysqli($servername, $username, $password, $dbname);
					 
			// 检测连接
			if ($conn->connect_error) {
				die("连接失败: " . $conn->connect_error);
			}
					 
			// 预处理及绑定
			$stmt = $conn->prepare("INSERT INTO background_image ( bgimageid,imageURL ) VALUES ( ?,? );");
			$stmt->bind_param("is",$nextImgID, $imageURL);
					 
			// 设置参数并执行
			$imageURL = $fileURL2 ;   /*传参*/
			$stmt->execute();  /*执行*/
					 
			echo "</br>新记录插入数据库";
					 
			$stmt->close();
			$conn->close();
			
// php连接数据库部分结束  ————————————————————————————————————————————————————————————
			
			
			
			
		} else{
			echo "文件体积过大";
		}
        
        
    }
}
else
{
    echo "非法的文件格式";
}







	



















?>



<!-- 
// 判断当前目录下的 ../img/backgroundimage/ 目录是否存在该文件
// 如果没有 ../img/backgroundimage/ 目录，你需要创建它，../img/backgroundimage/ 目录权限为 777
if (file_exists($fileURL))
    {
        echo $_FILES["file"]["name"] . " 文件已经存在。 ";
    }
    else
    {
        // 如果 ../img/backgroundimage/ 目录不存在该文件则将文件上传到 ../img/backgroundimage/ 目录下
        move_uploaded_file($_FILES["file"]["tmp_name"], $fileURL);
        echo "文件存储在: " . $fileURL;
} 
-->











