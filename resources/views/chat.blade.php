<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>大家都是小蝌蚪</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="YES">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png"/>
    <meta name="title" content="Workerman-todpole!" />
    <link rel="image_src" href="/images/fb-image.jpg" />
</head>
<body>
<canvas id="canvas"></canvas>

<div id="ui">
    <div id="fps"></div>

    <input id="chat" type="text" />
    <div id="chatText"></div>

    <div id="instructions">
        <h2>说明</h2>

        <p>直接键盘打字聊天!<br />上下左右控制移动<br />输入 name: XX 则会设置你的昵称为XX</p>
    </div>
    <aside id="info">
        <section id="wtf">
            <!-- 尊重他人劳动成果，请保留原作者相关链接 -->
            <h2>powered&nbsp;by&nbsp;<a rel="external" href="http://www.swoole.com/" target="_blank">swoole</a> &nbsp;&nbsp;&nbsp;&nbsp;感谢 <a href="https://github.com/walkor/workerman-todpole" target="_blank">workerman-todpole</a> and <a href="https://github.com/danielmahal/Rumpetroll" target="_blank">rumpetroll.com</a></h2>
            <!-- 尊重他人劳动成果，请保留原作者相关链接 -->
        </section>
    </aside>

    <aside id="frogMode">
        <h3>Frog Mode</h3>
        <section id="tadpoles">
            <h4>Tadpoles</h4>
            <ul id="tadpoleList">
            </ul>
        </section>
        <section id="console">
            <h4>Console</h4>
        </section>
    </aside>

    <div id="cant-connect">
        disconnect with websocket server.
    </div>
    <div id="unsupported-browser">
        <p>
            您的浏览器不支持 <a rel="external" href="http://en.wikipedia.org/wiki/WebSocket">WebSockets</a>.
            推荐您使用以下浏览器
        </p>
        <ul>
            <li><a rel="external" href="http://www.google.com/chrome">Google Chrome</a></li>
            <li><a rel="external" href="http://apple.com/safari">Safari 4</a></li>
            <li><a rel="external" href="http://www.mozilla.com/firefox/">Firefox 4</a></li>
            <li><a rel="external" href="http://www.opera.com/">Opera 11</a></li>
        </ul>
        <p>
            <a href="#" id="force-init-button">仍然浏览!</a>
        </p>
    </div>

</div>

<script src="/js/lib/parseUri.js"></script>
<script src="/js/lib/modernizr-1.5.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/lib/Stats.js"></script>

<script src="/js/App.js"></script>
<script src="/js/Model.js"></script>
<script src="/js/Settings.js"></script>
<script src="/js/Keys.js"></script>
<script src="/js/WebSocketService.js"></script>
<script src="/js/Camera.js"></script>

<script src="/js/Tadpole.js"></script>
<script src="/js/TadpoleTail.js"></script>

<script src="/js/Message.js"></script>
<script src="/js/WaterParticle.js"></script>
<script src="/js/Arrow.js"></script>
<script src="/js/formControls.js"></script>

<script src="/js/Cookie.js"></script>
<script src="/js/main.js"></script>


</body>
</html>