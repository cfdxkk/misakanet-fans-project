
<!DOCTYPE html>
<html>
	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	    <title>misakanet背景图控制台</title>
	  </head>
	<body>
		
		<div class="container">   <!-- boot start tag -->
			
			
			
			<?php
				//  防止全局变量造成安全隐患
				$flag = 2;
				//  启动会话，这步必不可少
				session_start();
				//  判断是否登陆
				if (isset($_SESSION["flag"]) && $_SESSION["flag"] <=1 ) {
					// require 'php/bgImgConsole/bgImgConsole.php';
					header('Location: php/bgImgConsole/bgImgConsole.php');
					exit;
				} else {
					//  验证失败，将 $_SESSION["flag"] 置为 2
					$_SESSION["flag"] = 2;
					// require "php/bgImgConsole/bgImgConsolerLogin.php";
					header('Location: php/bgImgConsole/bgImgConsolerLogin.php');
					exit;
				}
			?>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		</div>   <!-- boot end here -->
		    


		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>