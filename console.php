<!DOCTYPE html>
<html>
	<head>
	  <meta charset="UTF-8">
	  <!-- import CSS -->
	  <link rel="stylesheet" href="./css/element.css">
	  <style>
	    .el-menu-vertical-demo:not(.el-menu--collapse) {
	  	width: 200px;
	  	min-height: 400px;
	    }
		#maincon{
			height: 100%;
		}
		#frame_console_main1{
			height: 85vh;
			width: 80vw;
		}
	  </style>
	</head>
	<body>
		<div id="app">
			<el-container id="maincon">
				<el-aside width="auto">
					
					
					
					
					
					
					
					<form action="" method="post" target="frame2">
					
					
					<el-menu default-active="1-4-1" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" :collapse="isCollapse">
					  <el-submenu index="1">
					    <template slot="title">
					      <i class="el-icon-location"></i>
					      <span slot="title">导航一</span>
					    </template>
					    <el-menu-item-group>
					      <span slot="title">分组一</span>
					      <el-menu-item index="1-1" target="frame_console_main" onclick="this.form.action='background_image_show.php'" >背景图控制台</el-menu-item>
					      <el-menu-item index="1-2">选项2</el-menu-item>
					    </el-menu-item-group>
					    <el-menu-item-group title="分组2">
					      <el-menu-item index="1-3">选项3</el-menu-item>
					    </el-menu-item-group>
					    <el-submenu index="1-4">
					      <span slot="title">选项4</span>
					      <el-menu-item index="1-4-1">选项1</el-menu-item>
					    </el-submenu>
					  </el-submenu>
					  <el-menu-item index="2">
					    <i class="el-icon-menu"></i>
					    <span slot="title">导航二</span>
					  </el-menu-item>
					  <el-menu-item index="3" disabled>
					    <i class="el-icon-document"></i>
					    <span slot="title">导航三</span>
					  </el-menu-item>
					  <el-menu-item index="4">
					    <i class="el-icon-setting"></i>
					    <span slot="title">导航四</span>
					  </el-menu-item>
					  
					</el-menu>
					
					
					</form>
					
					
					
					
					
				</el-aside>
				<el-container>
					<el-header>
						
						<el-radio-group v-model="isCollapse" style="margin-bottom: 20px;">
						  <el-radio-button :label="false">展开</el-radio-button>
						  <el-radio-button :label="true">收起</el-radio-button>
						</el-radio-group>
						
					</el-header>
					<el-main>
						
						<iframe name="frame_console_main" id="frame_console_main1" frameborder="0"></iframe>    <!-- 接收php后端文件传回的文件上传状态 -->
						
					</el-main>
				</el-container>
			</el-container>	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		</div>
	</body>
	<!-- import Vue before Element -->
	<script src="./js/element-vue.js"></script>
	<!-- import JavaScript -->
	<script src="./js/element.js"></script>
	
	
	<script>
	  var Main = {
	      data() {
	        return {
	          isCollapse: true
	        };
	      },
		  methods: {
		        handleOpen(key, keyPath) {
		          console.log(key, keyPath);
		        },
		        handleClose(key, keyPath) {
		          console.log(key, keyPath);
		        }
		      }
	    }
	  var Ctor = Vue.extend(Main)
	  new Ctor().$mount('#app')
	</script>

</html>