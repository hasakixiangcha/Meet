//首页生日日期选择
function selectdate(datetype){
	if(datetype=='year'){
		$("input[name=year]").val('请选择');
		$("#selectyear").show();
		$("#years").show()
		$("#selectmonth").hide();
		$("#months").hide()
		$("#selectdate").hide();
		$("#dates").hide();
	}else if(datetype=='month'){
		$("input[name=month]").val('请选择');
		$("#selectyear").hide();
		$("#years").hide()
		$("#selectmonth").show();
		$("#months").show()
		$("#selectdate").hide();
		$("#dates").hide()
	}else if(datetype=='date'){
		$("input[name=date]").val('请选择');
		$("#selectyear").hide();
		$("#years").hide()
		$("#selectmonth").hide();
		$("#months").hide()
		$("#selectdate").show();
		$("#dates").show()
	}
	$("#selectaddress").hide();
	$(".address").hide();
	$("#selectcity").hide();
}
//首页确定生日日期
function selecteddate(datetype){
	if(datetype){
		$("#select"+datetype).hide();
		$("#"+datetype+"s").hide()
	}
}
//首页返回城市
function backprovince(){
	$("#selectaddress").show();
	$("#selectcity").hide();
}


//搭讪页面发布话题
function publishtopic(obj){
	$(obj).slideUp();
	$("#publishtopic").slideDown();
}
//搭讪页面关闭发布话题
function closetopic(){
	$(".topicbtn").slideDown();
	$("#publishtopic").slideUp();
}
//商品详情页 商品评价、详情切换
 function changedata(obj,str){
	$(obj).addClass('selectstyle').siblings('div').removeClass();
	if(str=='comment'){
		
	}
}

 //商品详情页商品加入购物车方法
 function gocart(){
  	
 }
 //商品购买、添加购物车时数量的减少
 function reducenum(obj){
 	var now=$(obj).siblings('.textnum').val();
 	if(now>1){
 		--now;
 		$(obj).siblings('.textnum').val(now);
 	}
 }
 //商品购买、添加购物车时数量的增加
 function plusnum(obj){
 	var now=$(obj).siblings('.textnum').val();
 	++now;
 	$(obj).siblings('.textnum').val(now);
 }
//商品规格、数量选择确定
function specialtrue(){
	var goodsnum=$("#selectnum").val();
	$("#goodsnum").val(goodsnum);
	var index=[];
	$('.goodsselect>.selecttrue').each(function(){
		index.push($(this).index());
	})
	
	for(var i=0;i<index.length;i++){
		$(".goodsselecttrue").eq(i).children('li').eq(index[i]).addClass('selecttrue').siblings('li').removeClass('selecttrue');
	}
	$(".buygoodsselect").hide();
}
//商品规格、数量选择取消
function specialcancel(){
	$(".buygoodsselect").hide();
}
