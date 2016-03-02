<html>
<head>

<title>Coin Shield</title>
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
</head>


<body onload="StartApplication();">
<div class="header white-background header-smaller">
<div class="header-navigation">
<div class="header-logo black-text-large"><img src="images/logo.png"></div>
</div>
</div>
  
 <div class="white-background grey-border" style="display: inline-block; position: fixed; height: 80%; margin: 80 -49%; width: 25%;">
 <!--
<div id="network-status" class="white-background grey-border" style="overflow: hidden; width: 100%; height: 50%;">
<iframe src="https://kiwiirc.com/client/irc.kiwiirc.com/?theme=mini#coinshield" style="border:0; width:100%; height:100%;"></iframe>
</div>
<br>
<div id="recent-trades" class="white-background grey-border" style="overflow: hidden; width: 100%; height: 50%;">
</div>
-->


<input id="tab-1" class="tab-input" type="radio" name="tab-group" checked="checked" />
<label for="tab-1" class="tab-label">Mining</label>
 
<input id="tab-2" class="tab-input" type="radio" name="tab-group" />
<label for="tab-2" class="tab-label">Market</label>

<input id="tab-3" class="tab-input" type="radio" name="tab-group" />
<label for="tab-3" class="tab-label">Supply</label>
 
<div id="frame-1" class="tab-container-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

<div id="frame-2" class="tab-container-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
</div>

<div id="frame-3" class="tab-container-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">

</div>

</div>

<div class="white-background grey-border" style="position: fixed; overflow: auto; width: 70%; height: 80%; float: right; margin: 80 -23%; display: inline-block;">

<input id="header-1" class="header-input" type="radio" name="tab-group-header" checked="checked" />
<label for="header-1" class="header-label">Home</label>

<input id="header-2" class="header-input" type="radio" name="tab-group-header"/>
<label for="header-2" class="header-label">Network</label>

<input id="header-3" class="header-input" type="radio" name="tab-group-header"/>
<label for="header-3" class="header-label">Explorer</label>

<input id="header-4" class="header-input" type="radio" name="tab-group-header"/>
<label for="header-4" class="header-label">Platform</label>

<input id="header-5" class="header-input" type="radio" name="tab-group-header"/>
<label for="header-5" class="header-label">IRC</label>

<input id="header-6" class="header-input" type="radio" name="tab-group-header"/>
<label for="header-6" class="header-label">Forums</label>

<div id="main-frame-1" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
A
</div>

<div id="main-frame-2" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
B
</div>

<div id="main-frame-3" class="main-frame fade-transition center-text" style="overflow: auto; width: 100%; height: 90%;">

<table style="width: 90%; margin: 0 auto;">
<tr>
<td colspan="2">
<div id="error_dialogue" class="center-text blue-text-small">Search by Block Hash / Height or Tx ID</div>
</td>
</tr>
<tr>
<td style="width: 95%">
<input class="input-text" type="text" id="search" value="0" size="75" width="100%">
</td>
<td style="width: 5%;" onclick="ValidateSearch();" class="header-label">Search!
</td>
</tr>
</table>


<div id="explorer-body" style="margin: 0 auto;">Test Explorer Default Content</div>
</div>

<div id="main-frame-4" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
D
</div>

<div id="main-frame-5" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
E
</div>

<div id="main-frame-6" class="main-frame fade-transition" style="overflow: auto; width: 100%; height: 90%;">
F
</div>

</div>


<div id="prompt-container" class="black-border transparent-white prompt-window fade-transition fade-hidden">
<div onclick="HideContent()" id="close-button" style="background: url('images/close_button.png'); background-size: contain;" class="close-image"></div>
<div id="prompt-body" class="prompt-content">
</div>
</div>

<script type="text/javascript">
	setInterval(function {
		UpdateConsole();
	}, 2000);
</script>

</body>
</html>
