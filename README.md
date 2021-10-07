# 已关停 ShutDonw Now
# misakanet-fans-project
这是我练习 `网站服务器部署` `html` `css` `js` `php` `mysql` 的项目，目前实现的功能如下：
```
调用墨迹天气API获取大连市的实时天气情况
调用系统时钟显示时间
背景图轮播 => {PHP将数据库中的所有背景图遍历渲染到dom，js控制背景图div堆叠顺序实现的轮播，过渡动画由js操作背景图div不透明度实现}
——————————————————
php+mysql的背景图控制台，数据库操作由mysqli实现，控制台登录验证是简单的 cookie+session 安全性未知
```

目前遇到的问题：
```
0. 只能获取大连市的天气情况，没写根据定位获取其他城市的天气情况的方法，懒得写了，如果有大佬想写的话可以fork
1. php过于臃肿，逐渐屎山
2. 登录验证是瞎写的，没有登录状态保持功能，session随网页关闭而销毁，登录验证也肯定有安全漏洞，如果大佬找到漏洞可以给我提建议
3. misakanet里没有misaka   我的电脑里居然一张炮姐的壁纸都没有
```

## 首页地址：
[http: misakanet - fans](http://www.misakanet.fans/)  
[https: misakanet - fans](https://www.misakanet.fans/)
## 管理后台地址：
[http: misakanet - 背景图控制台](http://www.misakanet.fans/bgImgConsolePad.php)  
[https: misakanet - 背景图控制台](https://www.misakanet.fans/bgImgConsolePad.php)

搞阿里云CDN的时候好像把https证书整丢(坏)了，如果https不能访问就用http试试
控制台只有管理背景图的功能，如果你有好看的壁纸想要上传，可以联络我以获取管理后台账号密码，QQ：2567240058 或邮箱联络：2567240058@qq.com / b2567240058@gmail.com
(其实已经写在注释里了，不要搞破坏哦~)

## install this project

`CentOS`
1. install git
```
[root@servername /]# yum install git
```
2. install apache server(httpd)
```
[root@servername /]# yum install httpd
```
3. set httpd run when server start 
```
[root@servername /]# systemctl enable httpd.service
```
3.5 check out httpd will run when server start
```
[root@servername /]# systemctl is-enabled httpd.service

```
if you see `enable`, It mean httpd will start when server start

4.restart
```
[root@servername /]# reboot
```

5. git clone
```
[root@servername /]# cd /var/www/html
[root@servername html]# git clone https://github.com/cfdxkk/misakanet-fans-project.git
```

done!

# 预览图
[![Wi3tN6.jpg](https://z3.ax1x.com/2021/07/12/Wi3tN6.jpg)](https://imgtu.com/i/Wi3tN6)
