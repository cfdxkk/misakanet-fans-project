<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<!-- input_css -->
		<link rel="stylesheet" type="text/css" href="./css/JsClock.css"/>
		<!-- input_javascript -->
		<script src="./js/JsClock.js" type="text/javascript" charset="utf-8"></script>
		
		

		<title>misakanet - hello</title>
	</head>
	<body onLoad="initClock()">


		<?php
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
			
			
			// echo 
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

		<div id="timedate">
			<div style="font-size: 85px;">
				<a id="h">12</a> :
				<a id="m">00</a><br />
			</div>
		<!-- 	<a id="s">00</a>:
			<a id="mi">000</a><br /> -->
			<a id="mon">January</a>
			<a id="d">1</a>,
			<a id="y">0</a>
			
			<?php
			 echo
			 "</br><a>".$weather."&nbsp;&nbsp;&nbsp;&nbsp;".$temp."℃"."</a>"
			 ;
			 ?>
		</div>

		<script type="text/javascript">
			// START CLOCK SCRIPT
			
			Number.prototype.pad = function(n) {
			  for (var r = this.toString(); r.length < n; r = 0 + r);
			  return r;
			};
			
			function updateClock() {
			  var now = new Date();
			  var milli = now.getMilliseconds(),
			    sec = now.getSeconds(),
			    min = now.getMinutes(),
			    hou = now.getHours(),
			    mo = now.getMonth(),
			    dy = now.getDate(),
			    yr = now.getFullYear();
			  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
			  // var tags = ["mon", "d", "y", "h", "m", "s", "mi"],
			  var tags = ["mon", "d", "y", "h", "m"],
			    corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), milli];
			  for (var i = 0; i < tags.length; i++)
			    document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
			}
			
			function initClock() {
			  updateClock();
			  window.setInterval("updateClock()", 1);
			}
			
			// END CLOCK SCRIPT
		</script>


<!-- <ul>
	<li>
		
	</li>
</ul>

<ul>
	<li></li>
	<li></li>
	<li></li>
</ul> -->



	</body>
</html>
