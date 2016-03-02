<html>
<head>

<title>Nexus Platform</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui" />
<meta name="apple-mobile-web-app-capable" content="yes">


<link href="css/body.css" rel="stylesheet" type="text/css">
<link href="css/forms.css" rel="stylesheet" type="text/css">
<link href="css/prompt.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/colors.css" rel="stylesheet" type="text/css">
<link href="css/tabs.css" rel="stylesheet" type="text/css">
<link href="css/transition.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="script/ajax.js"></script>
<script src="script/classie.js"></script>

<!-- get jQuery from the google apis -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
<script type="text/javascript" src="css/slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="css/slider/rs-plugin/css/settings.css" media="screen" />

<script type="text/javascript">
				jQuery(document).ready(function() {
					   jQuery('.tp-banner').revolution(
						{
							delay:10000,
							startwidth:1170,
							startheight:550,
							hideThumbs:10
						});
				});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60250288-1', 'auto');
  ga('require', 'displayfeatures');
  
  <?php
  if(!isset($_GET['tab']))
	echo "SubmitPage('Interface');";
  else
	echo "SubmitPage('".$_GET['tab']."');";
  ?>

</script>
</head>


<body onload="StartApplication();">
<div class="header white-background header-smaller" style="height: 80px;">
<div class="header-navigation"> 
<div class="header-logo black-text-large" onclick="document.getElementById('header-1').checked = 'checked';"><img src="images/logo.png" height="80px"></div>
</div>
</div>
  
 <div class="white-background grey-border" style="display: inline-block; position: fixed; height: 85%; margin: 80 -49%; width: 25%;">
 <!--
<div id="network-status" class="white-background grey-border" style="overflow: hidden; width: 100%; height: 50%;">
<iframe src="https://kiwiirc.com/client/irc.kiwiirc.com/?theme=mini#coinshield" style="border:0; width:100%; height:100%;"></iframe>
</div>
<br>
<div id="recent-trades" class="white-background grey-border" style="overflow: hidden; width: 100%; height: 50%;">
</div>
-->


<input id="tab-1" class="tab-input" type="radio" name="tab-group" checked="checked" />
<label for="tab-1" class="tab-label">Network</label>
 
<input id="tab-2" class="tab-input" type="radio" name="tab-group" />
<label for="tab-2" class="tab-label">Market</label>

<input id="tab-3" class="tab-input" type="radio" name="tab-group" />
<label for="tab-3" class="tab-label">Economy</label>
 
<div id="frame-1" class="tab-container-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

<div id="frame-2" class="tab-container-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

<div id="frame-3" class="tab-container-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

</div>

<div class="white-background grey-border" style="position: fixed; overflow: auto; width: 73%; height: 85%; float: right; margin: 80 -23%; display: inline-block;">

<input id="header-1" class="header-input" type="radio" name="tab-group-header" <?php if(!isset($_GET['tab'])) echo "checked='checked'"; ?>/>
<label for="header-1" class="header-label">Home</label>

<input id="header-2" class="header-input" type="radio" name="tab-group-header" <?php if(isset($_GET['tab']) && $_GET['tab'] == 'Download') echo "checked='checked'"; ?> onclick="SubmitPage('Download');"/>
<label for="header-2" class="header-label">Download</label>

<input id="header-3" class="header-input" type="radio" name="tab-group-header" <?php if(isset($_GET['tab']) && $_GET['tab'] == 'Explorer') echo "checked='checked'"; ?> onclick="SubmitPage('Explorer');"/>
<label for="header-3" class="header-label">Explorer</label>

<input id="header-4" class="header-input" type="radio" name="tab-group-header" <?php if(isset($_GET['tab']) && $_GET['tab'] == 'Platform') echo "checked='checked'"; ?> onclick="SubmitPage('Platform');"/>
<label for="header-4" class="header-label">Platform</label>

<input id="header-5" class="header-input" type="radio" name="tab-group-header" <?php if(isset($_GET['tab']) && $_GET['tab'] == 'IRC') echo "checked='checked'"; ?> onclick="SubmitPage('IRC');"/>
<label for="header-5" class="header-label">IRC</label>

<div id="main-frame-1" class="main-frame fade-transition tp-banner" style="overflow: hidden; width: 100%; height: 90%;">
<ul>    
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-1.jpg" style="height: 90%;">					
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-1.jpg" alt="" />               					
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-2.jpg" style="height: 90%;">				
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-2.jpg" alt="" />               						
    </li>
          	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-3.jpg" style="height: 90%;">				
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-3.jpg" alt="" />               					
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-4.jpg" style="height: 90%;">				
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-4.jpg" alt="" />               					
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-5.jpg" style="height: 90%;">				
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-5.jpg" alt="" />               					
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-6.jpg" style="height: 90%;">					
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-6.jpg" alt="" />               						
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-7.jpg" style="height: 90%;">					
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-7.jpg" alt="" />               						
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-8.jpg" style="height: 90%;">					
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-8.jpg" alt="" />               						
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-9.jpg" style="height: 90%;">					
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-9.jpg" alt="" />               						
    </li>
	
	<li data-transition="fade" data-slotamount="3" data-thumb="http://nexusoft.io/platform/images/sliders/revolution/nexus-10.jpg" style="height: 90%;">					
		<img src="http://nexusoft.io/platform/images/sliders/revolution/nexus-10.jpg" alt="" />               						
    </li>
</ul>
</div>

<div id="main-frame-2" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

<div id="main-frame-3" class="main-frame fade-transition center-text" style="overflow: hidden; width: 100%; height: 90%;">

<div style="position: absolute; height: 15%; margin: 0 auto; width: 100%; z-index: 999; background: #f9f9f9; text-align: center; border-radius: 0 0 .25em .25em;">
<table style="width: 80%; margin: 0 auto;">
<tr>
<td colspan="3">
<div id="error_dialogue" class="center-text blue-text-smaller">Initializing...</div>
</td>
</tr>
<tr>
<td style="width: 95%">
<input class="input-text grey-border" type="text" id="search" value="Search by Block Hash, Height, or Tx ID..." size="75" width="100%" onfocus="if(this.value == 'Search by Block Hash, Height, or Tx ID...') this.value = '';" onblur="if(this.value == '') { this.value = 'Search by Block Hash, Height, or Tx ID...'; }">

<script type="text/javascript">
document.getElementById('search').onkeypress = function(e){
    if (!e) e = window.event;
    var keyCode = e.keyCode || e.which;
    if (keyCode == '13'){
      ValidateSearch();
	  
      return false;
    }
  }
</script>
</td>
<td style="width: 10%;">
<a href="javascript:void(0);" onclick="ValidateSearch();" class="input-button grey-border">Search!</a>
</td>
<td style="width: 10%;">
<a href="javascript:void(0);" onclick="document.getElementById('search').value='Search by Block Hash, Height, or Tx ID...'; document.getElementById('error_dialogue').innerHTML = 'Input Data Cleared...';" class="input-button grey-border">Clear</a>
</td>
</tr>
</table>
</div>

<div id="explorer-body" style="position: absolute; height: 80%; width: 100%; margin: 10% auto; overflow: auto;"></div>
</div>

<div id="main-frame-4" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

<div id="main-frame-5" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

</div>


<div id="prompt-container" class="black-border transparent-white prompt-window fade-transition fade-hidden">
<div onclick="HideContent()" id="close-button" style="background: url('images/close_button.png'); background-size: contain;" class="close-image"></div>
<div id="prompt-body" class="prompt-content">
</div>
</div>

<script type="text/javascript">
	setInterval( function() { UpdateConsole(3333); }, 33333 );
</script>



</body>
</html>
