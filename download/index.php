<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="copyright" content="Copyright (c) 2014 High Fidelity Inc. http://www.highfidelity.io" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/chosen/chosen.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/download.css?v=3">
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="//use.typekit.net/xyu1mnf.js"></script>
    <script type="text/javascript" src="js/download.js?v=2"></script>
    <title>Download</title>
</head>
<header role="header">
    <nav id="navbar">
        <a class="logo" href="https://highfidelity.io/" title="High Fidelity"></a>
    </nav>
</header>
<div id="container">
	<div id="changelog-container">
		<div id="changelog-close"></div>
		<div id="changelog-title">Changelog</div>
		<div id="changelog-contents">
		</div>
	</div>
    <div id="inner-container">
        <div id="interface">
            <div class="interface" id="interface-logo">
                <h2>Interface</h2>
                <a id="interface-logo"></a>
            </div>
            <div class="interface" id="interface-details">
                <div  class="choose-os-container">
                    <div id="os-icon">
                        <a class="os-icon os-icon-mac selected"></a>
                        <a class="os-icon os-icon-windows"></a>
                        <a class="os-icon os-icon-linux"></a>
                    </div>
                    <select class="choose-os">
                        <option value="mac">Mac OS X</option>
                        <option value="windows">Windows</option>
                       <!-- <option value="linux">Linux</option> -->
                    </select>
                    <p>Requires Mountain Lion(10.8) or newer</p>
                </div>
                 <div  class="choose-build-version-container">
                    <p>Select build</p>
                    <div id="choose-build-version-interface"></div>
                    <p class="build-time"></p>
                </div>
                <div class="download-container">
                    <a class="download">Download</a>
                </div>
                <div class="release-notes"></div>
                <div id="changelog-link">Changelog</div>
            </div>
        </div>
        <div id="stackmanager">
            <div class="stackmanager">
                <h2>Stack Manager</h2>
                <a id="stackmanager-logo"></a>
            </div>
            <div class="stackmanager">
                <div  class="choose-os-container">
                    <div id="os-icon">
                        <a class="os-icon os-icon-mac"></a>
                        <a class="os-icon os-icon-windows selected"></a>
                        <a class="os-icon os-icon-linux"></a>
                    </div>
                    <select class="choose-os">
                        <option value="mac">Mac OS X</option>
                        <option value="windows">Windows</option>
                        <!-- <option value="linux">Linux</option> -->
                    </select>
                    <p class="build-time">Requires Mountain Lion(10.8) or newer</p>
                </div>
                 <div  class="choose-build-version-container">
                    <p>Select build</p>
                    <div id="choose-build-version-stackmanager"></div>
                    <p></p>
                </div>
                <div  class="download-container">
                    <a class="download">Download</a>
                </div>
                <div class="release-notes"></div>
            </div>
        </div>
    </div>
</div>

