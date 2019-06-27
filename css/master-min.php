<?php 
	header("Content-type: text/css",true); 
	ob_start("hostingpress_compress");
	function hostingpress_compress($buffer) {
	  /* remove comments */
	  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	  /* remove tabs, spaces, newlines, etc. */
	  $buffer = str_replace(array("\r\n", "\r", "\n", "\t",'    '), '', $buffer);
	  return $buffer;
	}
	  
	/* css files */
	include('../css/bootstrap.min.css'); /* Import Visual Composer Stylesheet */
	include('../css/bootstrap-theme.min.css'); /* Import Modified Visual Composer Stylesheet */
	include('../css/spinners.css'); /* Import Basic Styles, Typography, Forms etc stylesheet */
	include('../vendors/owl.carousel/owl.carousel.css'); /* Import Responsive Grid System Stylesheet */
	include('../vendors/simple-line-icons/css/simple-line-icons.css'); /* Import Full width Sections + Parallax Stylesheet */
	include('../vendors/bootstrap-select/css/bootstrap-select.min.css'); /* Import fancyBox Stylesheet */
	include('../css/font-awesome.min.css'); /* Import Flex Slider Stylesheet */
	include('../vendors/lineariconsfree/style.css'); /* Import Vector Icons Stylesheet */
	include('../css/magnific-popup.css'); /* Import Blog stylesheet */
	include('../css/slick.css'); /* Import Elements stylesheet */
	include('../css/slick-theme.css'); /* Import Widgets stylesheet */
	include('../css/default/style.css'); /* Import Icon Boxes stylesheet */
	include('../css/responsive/responsive.css'); /* Import Color Skins Stylesheet */
	

	ob_end_flush();
?>