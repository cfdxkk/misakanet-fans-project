window.onload = function(){
	$("#mask").hide();  //隐藏遮罩
	window.setInterval("opChange()",12000);  //每隔12000毫秒(12s)执行一次图片切换函数
	updateClock();    //获取系统时钟
	window.setInterval("updateClock()", 1000);  //每隔1000毫秒(10s)获取一次系统时钟
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
