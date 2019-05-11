<?php ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html >
<head>

    <title>Virtual Labs</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="MSSmartTagsPreventParsing" content="true">
    <meta name="Copyright" content="(c) 2005-2009 Mozilla. All rights reserved.">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="Rating" content="General">

        
	<link rel="stylesheet" type="text/css" href="images_site/panel.css">
    <link rel="stylesheet" type="text/css" href="images_site/style.css" media="all">    
    <link rel="stylesheet" type="text/css" href="images_site/forms.css">
  <script type="text/javascript" src="js_site/functions.js"></script>
	<script type = "text/javascript">	

var interval = 4500;
var imageDir = "images_slide/";
var imageNum = 0;
var imageArray = new Array();
var timerId;
var dString = new Array();

function imageItem(image_location)
{
        this.image_item = new Image();
        this.image_item.src = image_location;
}

imageArray[imageNum++] = new imageItem(imageDir + "IntroFig2.png");
imageArray[imageNum++] = new imageItem(imageDir + "IntroFig3.png");
imageArray[imageNum++] = new imageItem(imageDir + "IntroFig4.png");

imageNum = 0;

var totalImages = imageArray.length;
imageNum = 0;

function get_ImageItemLocation(imageObj)
{
        return(imageObj.image_item.src);
}
function getNextImage()
{
        imageNum = (imageNum + 1) % totalImages;
        var new_image = get_ImageItemLocation(imageArray[imageNum]);
        return(new_image);
}
function switchImage(id)
{
        var new_image = getNextImage();
        document[id].src = new_image;
        var rec_call = "switchImage('"+id+"')";
        timerId = setTimeout(rec_call, interval);
}


function getPrevImage()
{       
        imageNum = (imageNum - 1) % totalImages;
        var new_image = get_ImageItemLocation(imageArray[imageNum]);
        return(new_image);
}

function prevImage(id)
{
        var new_image = getPrevImage();
        document[id].src = new_image;
}
function desc(id,num)
{
        var str = "<br /><b>Download</b>";
        document.getElementById(id).innerHTML = '<b>Project Partners : </b>' + dString[num] + str;      
}


</script>

	</head>
<body onLoad = "switchImage('slideImg')">

<div id="container">    
<div id="header_new">
                        <p><img src="images_site/header_01.jpg"></p>				
</div> 

            
	
       	<div id="navbar">
	
		<SPAN class="inbar">
			<UL>
				<!-- Home -->
				<LI class="navhome">
					<A href="index.php"><SPAN><u> Home </u></SPAN></A>
				</LI>
				<LI> <IMG src = "images_site/nav-bar-sep.png"/> </Li>
	
				<LI>
					<A href="experimentHome.php"><SPAN><u> Start Experiments </u></SPAN> </A>
				</LI>
				<LI> <IMG src = "images_site/nav-bar-sep.png"/> </Li>

				<LI>
					<A href="faqs.php"><SPAN><u> FAQs </u></SPAN> </A>
				</LI>
				<LI> <IMG src = "images_site/nav-bar-sep.png"/> </Li>
	
				
				<!-- Troubleshooting -->
				<LI >
					<A href="http://virtual-labs.ac.in/feedback/"><SPAN><u> Feedback </u></SPAN></A>
				</LI>
				<LI> <IMG src = "images_site/nav-bar-sep.png"/> </Li>
				
				<LI >
					<A href="http://vlab.iiit.ac.in:8080/"><SPAN><u>Live Support</u></SPAN></A>
				</LI>
				<LI> <IMG src = "images_site/nav-bar-sep.png"/> </Li>
				<LI >
					<A href="http://vlab.co.in"><SPAN><u> Vlab.co.in </u></SPAN></A>
				</LI>
				<LI> <IMG src = "images_site/nav-bar-sep.png"/> </Li>
				<!-- Troubleshooting -->
				
				
    	    </UL>
		</SPAN>
		
	</div>

