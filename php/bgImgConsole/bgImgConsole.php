<!DOCTYPE html>
<html>
	<?php
		//  防止全局变量造成安全隐患
		$flag = 2;
		
		$lifeTime = 60;  //单位：秒
		// session_set_cookie_params($lifeTime);
		//  启动会话，这步必不可少
		session_start();
		//  判断是否登陆
		if (isset($_SESSION["flag"]) && $_SESSION["flag"] <=1 ) {
			// do nothing
		} else {
			//  验证失败，将 $_SESSION["flag"] 置为 2
			$_SESSION["flag"] = 2;
			// require "php/bgImgConsole/bgImgConsolerLogin.php";
			header('Location: bgImgConsolerLogin.php');
			exit;
		}
	?>
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
			
			
			<form action="" method="post">
				<button type="submit" class="btn btn-danger" onclick="this.form.action='bgImgConsoleLogout.php'">登出</button>
			</from>
			
			
			
			
			<div class="accordion" id="accordionExample">
			  <div class="card">
			    <div class="card-header" id="headingOne">
			      <h2 class="mb-0">
			        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			         背景图片上传
			        </button>
			      </h2>
			    </div>
			
			    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div class="card-body">
					  
					  
					  
					  
					  
					  <table class="table" width="100%">
					  	<thead class="thead-dark">
					  		<tr>
					  			<th scope="col">选择文件</th>
					  			<th scope="col">操作</th>
					  		</tr>
					  	</thead>
					  	<tbody>
					  		
					  		
					  		
					  		
					  		
					  		<tr>
					  			<form action="php/background_image_update.php" target="frame1" method="post" enctype="multipart/form-data">
					  				<td>
					  					<label for="file" style="display: none;"></label>
					  					<div class="form-group">
					  						<input type="file" name="file" class="form-control-file" id="file exampleFormControlFile1">
					  					</div>
					  				</td>
					  				<td>
					  					<button type="submit" name="submit" class="btn btn-primary">上传</button>
					  				</td>
					  		  </form>
					  		</tr>
					  		
					  		
					  		
					  		
					  		<tr>
					  		  <td colspan="2" >
					  			  <iframe name="frame1" frameborder="0" height="300" width="100%"></iframe>    <!-- 接收php后端文件传回的文件上传状态 -->
					  		  </td>
					  		</tr>
					  		
					  		
					  		
					  		
					  		
					  	</tbody>
					  </table>
					  
					  
					  
					  
					  
					  
					  
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingTwo">
			      <h2 class="mb-0">
			        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          背景图片预览
					  </br>
					  (为保证主页效果，请至少让三张图片显示)
			        </button>
			      </h2>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			      <div class="card-body">
					  
					  <?php   // 选择图片
							
					  
						  $servername = "localhost:3308";
						  $username = "backGroundImageChecker";
						  $password = "CODE001(daoragong)";
						  $dbname = "misakanet";
								 
								
						  // 创建连接
						  $conn = new mysqli($servername, $username, $password, $dbname);
								 
						  // 检测连接
						  if ($conn->connect_error) {
							die("连接失败: " . $conn->connect_error);
						  }
								 
						  $sql = "SELECT bgimageid,imageURL,displayOrNot FROM background_image";
						  $result = $conn->query($sql);
						   
						  if ($result->num_rows > 0) {
						      // 输出数据
							  echo "
							  		<table class='table table-hover'>
							  			<thead>
							  				<tr>
												<th scope='col'>ID</th>
												<th scope='col'>图片预览</th>
							  					<th scope='col'>是否显示</th>
							  				</tr>
							  			</thead>
										<tbody>
							  										    
									
								";
						      while($row = $result->fetch_assoc()) {
								  
								  
								  echo "
										<tr>
										  <th scope='row'>".$row["bgimageid"]."</th>
										  <td><img src='"."http://127.0.0.1/myphp/misakanet_fans_proj".substr($row["imageURL"], 2)."'  alt='".$row["bgimageid"]."' height='100px' /></td>
										  <td>".$row["displayOrNot"]."</td>
										</tr>
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
			      </div>
			    </div>
			  </div>
			  
			  
			  
			  
			  
			  
			  <div class="card">
			      <div class="card-header" id="headingThree">
			        <h2 class="mb-0">
			          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			            背景图片管理
			          </button>
			        </h2>
			      </div>
			      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			        <div class="card-body">
						
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">在此输入图片ID</th>
						      <th scope="col">操作</th>
						    </tr>
						  </thead>
						  <tbody>
								<form action="" method="post" target="frame2">
									<tr>
										
										
										<th scope="row" >
											<input name="ImageIDstring" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										</th>
										<td >
											<button type="submit" class="btn btn-primary" onclick="this.form.action='background_image_show.php'">显示</button>
											<button type="submit" class="btn btn-warning" onclick="this.form.action='background_image_hidden.php'">隐藏</button>
											<button type="submit" class="btn btn-danger" onclick="this.form.action='background_image_drop.php'">删除</button>
										</td>
									</tr>
									<tr>
									  <td colspan="2" >
										  <iframe name="frame2" frameborder="0" height="300" width="100%"></iframe>    <!-- 接收php后端文件传回的文件上传状态 -->
									  </td>
									</tr>
								</form>
						  </tbody>
						</table>
						
						
			        </div>
			      </div>
			    </div>
			  
			  
			  
			  
			</div>
			
			
			
		</div>   <!-- boot end here -->
		    

		
		
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
