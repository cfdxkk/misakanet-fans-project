<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="baidu-site-verification" content="code-yKCV9KMPif" />
		
		<!-- input_css -->
		<link rel="stylesheet" type="text/css" href="./css/backgroundimage.css"/>
		<!-- input_MaskLoadingAnimation -->
		<link rel="stylesheet" type="text/css" href="./css/LoadingAnime.css"/>
		<!-- input_SearchBarcss -->
		<link rel="stylesheet" type="text/css" href="./css/SearchBar.css"/>
		<!-- input_JsClock.css -->
		<link rel="stylesheet" type="text/css" href="./css/JsClock.css"/>
		<!-- input_ICPnumber.css -->
		<link rel="stylesheet" type="text/css" href="./css/ICPnumber.css"/>

		<!-- input_jQuary_firse -->
		<script src="./js/jquery2.1.4.js" type="text/javascript"></script>
		<!-- input_javascript -->
		<script src="./js/backgroundimg.js" type="text/javascript" charset="utf-8"></script>
		<!-- input_JsClock.js -->
		<script src="./js/JsClock.js" type="text/javascript" charset="utf-8"></script>

		<link rel="icon" href="/img/icon/maomaotou.ico" type="image/x-icon"/>

		<title>misakanet - hello</title>
	</head>
	<body>
		
		<div id="banner">
			
			<?php
			
			
			$servername = "localhost";
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
						<div class='backGroundImage' style='background: url("."https://www.misakanet.fans".substr($row["imageURL"], 2).") center center no-repeat;	background-size: cover;'></div>
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
			
			
			
			
			<?php  //调用墨迹天气接口获取数据
				$host = "https://aliv13.data.moji.com";
				$path = "/whapi/json/alicityweather/condition";
				$method = "POST";
				$appcode = "16c971deef8d4ef896c7d8a194962a68";
				$headers = array();
				array_push($headers, "Authorization:APPCODE " . $appcode);
				//根据API的要求，定义相对应的Content-Type
				array_push($headers, "Content-Type".":"."application/x-www-form-urlencoded; charset=UTF-8");
				$querys = "";
				$bodys = "cityId=104&token=50b53ff8dd7d9fa320d3d3ca32cf8ed1";
				$url = $host . $path;
			
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($curl, CURLOPT_FAILONERROR, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_HEADER, true);
				if (1 == strpos("$".$host, "https://"))
				{
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				}
				curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);
				
				// var_dump(curl_exec($curl));
				
				// echo curl_exec($curl)."<br>"."<br>";
				$needablevalueFlag = stripos(curl_exec($curl),"\"condition\":")+12;
				// echo stripos(curl_exec($curl),"\"condition\":")."<br>"."<br>";
				$usefulDate = substr(curl_exec($curl),$needablevalueFlag);
				// echo substr(curl_exec($curl),$needablevalueFlag)."<br>"."<br>";
				
				
				$conditionFlag = stripos($usefulDate,"\"condition\":")+13;
				$usefulDate2 = substr($usefulDate,$conditionFlag);
				// echo substr($usefulDate,$conditionFlag)."<br>"."<br>";
				$conditionEndFlag = stripos($usefulDate2,"\",\"");
				$weather = substr($usefulDate2,0,$conditionEndFlag);
				// echo substr($usefulDate2,0,$conditionEndFlag)."<br>"."<br>";
				
				$tempFlag = stripos($usefulDate2,"\"temp\":")+8;
				$usefulDate3 = substr($usefulDate2,$tempFlag);
				// echo $usefulDate3."<br>"."<br>";
				
				$tempEndFlag = stripos($usefulDate3,"\",\"");
				$temp = substr($usefulDate3,0,$tempEndFlag);
				// echo $temp."<br>"."<br>";
				
				
				// echo               // debug here  
				// "
				// 	<ul>
				// 		<li>大连</li>
				// 		<li>".$weather."</li>
				// 		<li>".$temp."℃"."</li>
				// 	</ul>
				// ";
				
				// echo "数据类型是：".var_dump($curl)."<br>";
				// echo "直接输出curl是：".$curl;  //输出数据
				// echo "直接输出curl是：".$curl;  //输出数据
			
			?>
			
			
			
			
			<!-- <div class="backGroundImage" style="background: url(img/backgroundimage/1.png) center center no-repeat;	background-size: cover;"></div>
			<div class="backGroundImage" style="background: url(img/backgroundimage/2.png) center center no-repeat;	background-size: cover;"></div>
			<div class="backGroundImage" style="background: url(img/backgroundimage/3.png) center center no-repeat;	background-size: cover;"></div> -->
		</div>
		
		<div class="wrap" style="height:200px; background-color: rgba(255,255,255,0.4); filter: blur(125px);">  <!-- 这里是虚化的背景 -->
			
		</div>
		
		<div class="wrap">                             <!-- 这里是searchbar和JsClock -->
		
		
			<div id="timedate">
				<div class="timeStyle">
					<a id="h">12</a> :
					<a id="m">00</a><br />
				</div>
				<a id="mon" class="timedate_font">January</a>
				<a id="d" class="timedate_font">1</a>,&nbsp;
				<a id="y" class="timedate_font">0</a>
				
				<?php
					echo"&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"weatherStyle\">".$weather."&nbsp;&nbsp;".$temp."℃"."</a>";
				 ?>
			</div>
		
		
		   <div class="search">
		
				  <input onkeydown="kikbaiduSearch()" id="submitInput" type="text" class="searchTerm" placeholder="What are you looking for?">
				  <button  type="submit" class="searchButton" onclick="clickbaiduSearch()">
				   <!-- <i class="fa fa-search"></i> -->
					<svg t="1622421639087" class="searchIcon" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2634" ><path d="M661.333333 597.333333h-33.706666l-11.946667-11.52a277.333333 277.333333 0 0 0 63.146667-227.84c-20.053333-118.613333-119.04-213.333333-238.506667-227.84a277.546667 277.546667 0 0 0-310.186667 310.186667c14.506667 119.466667 109.226667 218.453333 227.84 238.506667a277.333333 277.333333 0 0 0 227.84-63.146667l11.52 11.946667v33.706666l181.333334 181.333334c17.493333 17.493333 46.08 17.493333 63.573333 0 17.493333-17.493333 17.493333-46.08 0-63.573334L661.333333 597.333333z m-256 0C299.093333 597.333333 213.333333 511.573333 213.333333 405.333333S299.093333 213.333333 405.333333 213.333333 597.333333 299.093333 597.333333 405.333333 511.573333 597.333333 405.333333 597.333333z"  p-id="2635"></path></svg>
				 </button>
			 
		   </div>
		</div>








		<div class="ICPnumber"> 
		<a id="ICPnumberAtag" href="http://icp.chinaz.com/home/info?host=misakanet.fans" target="_blank">
				辽ICP备2020012843号-1
			
		</a>
		</div>
	
		
		
		
		
		
		
		
		
		
		<div id="mask" class="loading"> <!-- 当背景图片没有加载完成时的遮罩 -->
			<!-- <h1>加载中</h1> -->
		</div>
		
		<script type="text/javascript">
			
			function clickbaiduSearch(){
				let inputtext = document.getElementById("submitInput").value
				console.log(inputtext)
				// window.location.replace("https://www.baidu.com/s?wd="+inputtext)
				window.location.href="https://www.baidu.com/s?wd="+inputtext
			}
			function kikbaiduSearch(){
				
				let theEvent = window.event || event;
				let code = theEvent.keyCode || theEvent.which;
				if (code == 13) {
					let inputtext = document.getElementById("submitInput").value
				    console.log("#remark")
					// window.location.replace("https://www.baidu.com/s?wd="+inputtext)
					window.location.href="https://www.baidu.com/s?wd="+inputtext
				}
			}
		</script>
		
	</body>
</html>
