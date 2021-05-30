window.onload = function(){
	$("#mask").hide();  //隐藏遮罩
	window.setInterval("opChange()",8000);  //每隔3秒执行一次图片切换函数
}


function opChange(){
	var e_first=$("#banner div:first");
	var e_last=$("#banner div:last");
	e_first.animate({"filter":"Alpha(opacity=0)","opacity":"0"},function(){
		//第一个图片透明度变为0的时候，将它移动到最后
		e_first.insertAfter(e_last);
		//将最后一个图片的透明度恢复
		e_last.animate({"filter":"Alpha(opacity=100)","opacity":"1"});
	});
}