<!DOCTYPE html>
<html>
<head>
  <title>Embed API Demo</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="../css/app.css">
  <script>
      (function(w,d,s,g,js,fs){
        g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
        js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
        js.src='https://apis.google.com/js/platform.js';
        fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
      }(window,document,'script'));
      </script>
</head>
<body>
<header id="loginHeader">
		<img src="../img/logo.png" alt="logo" id="loginlogo">
		<a href="../index.html" id="backLink">Back To Main Site</a>
	</header>

<div id="logincontainer">
<div id='outContainer'>
  <div id="embed-api-auth-container"></div>
  <div id="view-selector-1-container" class='auth'></div>
  <div id="view-selector-2-container" class='auth'></div>
  <div id="view-selector-3-container" class='auth'></div>
  <div id="view-selector-4-container" class='auth'></div>
  <div id='graphs'>
    <div id="chart-1-container" class='metric'></div>
    <div id="chart-2-container" class='metric'></div>
    <div id="chart-3-container" class='metric'></div>
    <div id="chart-4-container" class='metric'></div>
  </div>
  </div>
    </div>

<script src='js/google.js'></script>
</body>
</html>