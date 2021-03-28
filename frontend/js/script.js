
jQuery(document).ready(function($){
  let widthslide = 714;
  $("sliders .btn-left").click(function(){
	  let left = $("#slider .sliders").first().position().left || 0;
	  if(left <= Math.floor(-2 *widthslide) +1) return false;
	  
	  $("#sliders .sliders").animate({"left":left-widthslide},1000);
	  return false;
  });
  
	$("sliders .btn-right").click(function(){
	  let left = $("#slider .sliders").first().position().left || 0;
	  console.log(left);
	  
	  if(left >= 0) return false; 
	  
	  $("#sliders .sliders").animate({"left":left-widthslide,1000;
	  return false;
	});