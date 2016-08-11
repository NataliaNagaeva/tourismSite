function init(){
	var isShowImg = false;
	
	$('.imgNews').on('click', function(){
		if(isShowImg){
			$(this).removeClass("selected-image");
			isShowImg = false;
		}else{
			$(this).addClass("selected-image");
			isShowImg = true;
		}
	});
}

$(document).ready(init);