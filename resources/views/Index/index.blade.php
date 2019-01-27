<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>{{ $title }}</title>
		<link rel="icon" type="image/x-icon" href="/favicon.ico" />
		<link rel="stylesheet" href="/Home/css/common.css" />
		<link rel="stylesheet" href="/Home/css/index.css" />
	</head>
	<body>
	<div id="fixedbox">
		<header id="header">
			<div class="logo">
				<a href="/Index">
				<div id="logoimg"><img src="/Home/img/logo.png" /></div>
				<div class="line"></div>
				<p id="logotip">正规婚恋交友网站</p>
				</a>
			</div>
			<div id="login">
				<p class="logintip">当前，湖南地区已有<span class="personnum">5210</span>人在线征婚交友</p>
				<form action="" method="post">
				<p class="loginwhrite">
					<input type="text" placeholder="邮箱/ID/手机号" />
					<input type="password" placeholder="密码"/>
					<button class="loginsubmit">登&nbsp;&nbsp;录</button>
				</p>
				</form>
			</div>
		</header>
		<div id="content">
			<ul id="personimg">
				<li>
					<img src="/Home/img/person/meimei1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/meimei2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/shuaige1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/meimei3.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/meimei4.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/shuaige2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/meimei5.jpg" />
				</li>
				
				
				<li>
					<img src="/Home/img/person/s1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/m1.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/m2.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/s2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/m4.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/m3.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/m5.jpg" />
				</li>
				
				<li>
					<img src="/Home/img/person/meimei1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/meimei2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/shuaige1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/meimei3.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/meimei4.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/shuaige2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/meimei5.jpg" />
				</li>
				
				<li>
					<img src="/Home/img/person/s1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/m1.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/m2.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/s2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/m4.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/m3.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/m5.jpg" />
				</li>
				
				<li>
					<img src="/Home/img/person/meimei1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/meimei2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/shuaige1.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/meimei3.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/meimei4.jpg" />
				</li>			
				<li>
					<img src="/Home/img/person/shuaige2.jpg" />
				</li>
				<li>
					<img src="/Home/img/person/meimei5.jpg" />
				</li>
			</ul>
		</div>
		<section id="register">
			<section id="personintro">
			<div id="close"><img src="/Home/img/icon/close.png"/></div>
			<div id="introduce">
				<figure class="introduce">
					<img src="/Home/img/person/meimei4.jpg" />
					<figcaption class="introname">安娜</figcaption>
					<figcaption class="introdetail">
						<span>25岁</span><span>168cm</span><span>55kg</span>
					</figcaption>
					<figcaption class="introtab">
						<span>看电影</span><span>听音乐</span><span>游泳</span><span>弹钢琴</span>
						<span>看电影</span><span>听音乐</span><span>游泳</span><span>弹钢琴</span>
					</figcaption>
				</figure>
			</div>
			</section>
			<section id="registerbox">
				<div class="registertitle">
					<p>2000万人，已进入婚姻殿堂</p>
				</div>
				<form action="register.html" method="post">
				<table class="registercontent">
					<tr>
						<td>性&nbsp;&nbsp;&nbsp;&nbsp;别</td>
						<td><label><input name="sex" type="radio" value="1"/><i class="sex1"></i>男</label></td>
						<td><label><input name="sex" type="radio" value="0"/><i class="sex0"></i>女</label></td>
						<td></td>
					</tr>
					<tr>
						<td>生&nbsp;&nbsp;&nbsp;&nbsp;日</td>
						<td>
							<div class="selectdate" onclick="selectdate('year')">
								<input class="datetime" name="year" type="text" readonly="readonly" value="请选择"/>
								<div class="dateunit">年</div>
							</div>
							<div id="selectyear" class="selecttime" onclick="selecteddate('year')">
								<input type="text" readonly="readonly" value="请选择"/><span>年</span>
							</div>
							<ul id="years">
								<li><span>90后:</span><a>1990</a><a>1991</a><a>1992</a><a>1993</a><a>1994</a><a>1995</a><a>1996</a><a>1997</a><a>1998</a><a>1999</a></li>
								<li><span>80后:</span><a>1980</a><a>1981</a><a>1982</a><a>1983</a><a>1984</a><a>1985</a><a>1986</a><a>1987</a><a>1988</a><a>1989</a></li>
								<li><span>70后:</span><a>1970</a><a>1971</a><a>1972</a><a>1973</a><a>1974</a><a>1975</a><a>1976</a><a>1977</a><a>1978</a><a>1979</a></li>
								<li><span>60后:</span><a>1960</a><a>1961</a><a>1962</a><a>1963</a><a>1964</a><a>1965</a><a>1966</a><a>1967</a><a>1968</a><a>1969</a></li>
								<li><span>50后:</span><a>1950</a><a>1951</a><a>1952</a><a>1953</a><a>1954</a><a>1955</a><a>1956</a><a>1957</a><a>1958</a><a>1959</a></li>
								<li><span>40后:</span><a>1940</a><a>1941</a><a>1942</a><a>1943</a><a>1944</a><a>1945</a><a>1946</a><a>1947</a><a>1948</a><a>1949</a></li>
								<li><span>30后:</span><a>1930</a><a>1931</a><a>1932</a><a>1933</a><a>1934</a><a>1935</a><a>1936</a><a>1937</a><a>1938</a><a>1939</a></li>
							</ul>
						</td>
						<td>
							<div class="selectdate" onclick="selectdate('month')">
								<input class="datetime" name="month" type="text" readonly="readonly" value="请选择"/>
								<div class="dateunit">月</div>
							</div>
							<div id="selectmonth" class="selecttime" onclick="selecteddate('month')">
								<input type="text" readonly="readonly" value="请选择"/><span>月</span>
							</div>
							<ul id="months">
								<li>
									<a>1</a>
									<a>2</a>
									<a>3</a>
									<a>4</a>
									<a>5</a>
									<a>6</a>
									<a>7</a>
									<a>8</a>
									<a>9</a>
									<a>10</a>
									<a>11</a>
									<a>12</a>
								</li>
							</ul>
						</td>
						<td>
							<div class="selectdate" onclick="selectdate('date')">
								<input  class="datetime" name="date" type="text" readonly="readonly" value="请选择"/>
								<div class="dateunit">日</div>
							</div>
							<div id="selectdate" class="selecttime" onclick="selecteddate('date')">
								<input type="text" readonly="readonly" value="请选择"/><span>日</span>
							</div>
							<ul id="dates">
								<li><a>1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a><a>8</a><a>9</a><a>10</a><a>11</a></li>
								<li><a>12</a><a>13</a><a>14</a><a>15</a><a>16</a><a>17</a><a>18</a><a>19</a><a>20</a><a>21</a><a>22</a></li>
								<li><a>23</a><a>24</a><a>25</a><a>26</a><a>27</a><a>28</a><a>29</a><a>30</a><a>31</a></li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>地&nbsp;&nbsp;&nbsp;&nbsp;区</td>
						<td colspan="3">
							<div  id="address">
								<div class="city">湖南</div><input name="province" type="hidden"/>
								<div class="district">长沙</div><input name="city" type="hidden"/>
							</div>
							<div class="address">
								<div class="city">湖南</div>
								<div class="district">长沙</div>
							</div>
							<div  id="selectaddress">
								<div class="hotprovince">
									<h3>热门省市</h3>
									<p><a>北京</a><a>天津</a><a>上海</a><a>广东</a><a>湖南</a></p>
								</div>
								<div class="selectcity">
									<h3>选择省份</h3>
									<ul id="addresses">
										<li><span>A-G</span><a>安徽</a><a>福建</a><a>甘肃</a><a>广西</a><a>广东</a><a>贵州</a><a>澳门</a><a>国外</a></li>
										<li><span>H-J</span><a>海南</a><a>河南</a><a>河北</a><a>黑龙江</a><a>湖北</a><a>吉林</a><a>江西</a><a>江苏</a></li>
										<li><span>L-S</span><a>辽宁</a><a>内蒙古</a><a>宁夏</a><a>青海</a><a>山西</a><a>山东</a><a>山西</a><a>四川</a></li>
										<li><span>T-Z</span><a>台湾</a><a>西藏</a><a>香港</a><a>新疆</a><a>云南</a><a>浙江</a></li>
									</ul>
								</div>
							</div>
							<div id="selectcity">
								<p><b>重庆</b><a href="javascript:;" onclick="backprovince()">返回其他城市</a></p>
								<ul class="citys">
									<li><a>万州</a><a>涪陵</a><a>渝中</a><a>大渡口</a><a>江北</a><a>沙坪坝</a><a>九龙坡</a><a>南岸</a><a>万盛</a></li>
									<li><a>万州</a><a>涪陵</a><a>渝中</a><a>大渡口</a><a>江北</a><a>沙坪坝</a><a>九龙坡</a><a>南岸</a><a>万盛</a></li>
								</ul>
							</div>
						</td>
					</tr>
					<tr>
						<td>婚姻状况</td>
						<td><label><input name="marrystatus" type="radio" value='0'/>未婚</label></td>
						<td><label><input name="marrystatus" type="radio" value='1'/>离异</label></td>
						<td><label><input name="marrystatus" type="radio" value='2'/>丧偶</label></td>
					</tr>
					<tr>
						<td colspan="4"><input id="registersubmit" type="submit" value="免费注册"/></td>
					</tr>
				</table>
				</form>
				<p id="thirdlogin">第三方登录<a class="qqlogin"></a><a class="zfblogin"></a><a class="sinalogin"></a></p>
			</section>
		</section>
		<footer id="footer">
			<p>中文实名：转角遇见你    ICP证书：湘B2-20100074 Copyright © 2003-2015 版权所有</p>
		</footer>
	</div>
	</body>
	<script type="text/javascript" src="/Home/js/jquery-3.1.1.min.js" ></script>
	<script type="text/javascript" src="/Home/js/func.js" ></script>
	<script>
		$(function(){
			location.href='#';
			//点击图片，展示人物信息
			$("#personimg>li").click(function(){
				$("#register").animate({width:722},1000);
				$('#personintro').animate({left:0,},1000);
				$("#selectaddress").hide();
				$(".address").hide();
				$("#selectcity").hide();
				$("#selectyear").hide();
				$("#years").hide()
				$("#selectmonth").hide();
				$("#months").hide()
				$("#selectdate").hide();
				$("#dates").hide()
				var str='';				
			})
			//关闭人物展示
			$("#close").click(function(){
				$("#register").animate({width:420},1000);
				$("#selectaddress").hide();
				$(".address").hide();
				$("#selectcity").hide();
				$("#selectyear").hide();
				$("#years").hide()
				$("#selectmonth").hide();
				$("#months").hide()
				$("#selectdate").hide();
				$("#dates").hide()
			})
			//生日日期选择
			$("#years a").click(function(){
				var year=$(this).html();
				$("input[name=year]").val(year);
				$("#selectyear").hide();
				$("#years").hide()
				$("#selectmonth").show();
				$("#months").show()
			})
			$("#months a").click(function(){
				var month=$(this).html();
				$("input[name=month]").val(month);
				$("#selectmonth").hide();
				$("#months").hide()
				$("#selectdate").show();
				$("#dates").show()
			})
			$("#dates a").click(function(){
				var dat=$(this).html();
				$("input[name=date]").val(dat);
				$("#selectdate").hide();
				$("#dates").hide()
			})
			//地址选择
			$("#address").click(function(){
				$("#selectaddress").show();
				$(".address").show();
				$("#selectyear").hide();
				$("#selectmonth").hide()
				$("#selectdate").hide()
				$("#years").hide();
				$("#months").hide()
				$("#dates").hide()
			})
			//关闭地址弹出框
			$(".address").click(function(){
				$(this).hide()
				$("#selectaddress").hide();
				$("#selectcity").hide()
			})
			//选择省份
			$("#selectaddress a").click(function(){
				var pro=$(this).html();
				$('.city').html(pro);
				$('.district').html('');
				$("#selectcity").show()
				$(".address").show();
				$("#selectaddress").hide();
			})
			//选择城市
			$(".citys a").click(function(){
				var city=$(this).html();
				$('.district').html(city);
				$("#selectcity").hide()
				$(".address").hide();
			})
		})
		
	</script>
</html>
