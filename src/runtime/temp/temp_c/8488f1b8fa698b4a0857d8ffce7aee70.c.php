<?php if (!defined('LINKPHP_VERSION')) exit(); /*s:0:"";*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Websocket</title>
    <style>
        .warp{width:400px}
        #msg{padding:10px;border:1px solid #eee;min-height:500px;font-size:14px;line-height:1.8;line-height:1.8}
        #msg span{color:#2b94ff}
        #msg .datetime{color:#ddd}
        #msg .sysMsg{color:#fe684c}
        .infos{font-size:14px;color:#777;padding:8px 13px;text-align:right}
        input{padding:8px 12px;font-size:14px;width:374px;border:1px solid #eee;border-top:none}
    </style>
</head>

<body>
<div class="warp">
    <div id="msg"></div>
    <div>
        <input type="text" onkeypress="send(event,this)" placeholder="回车发送 /name 昵称 改名" />
    </div>
    <div class="infos">
        在线人数：
        <span id="online-nums"></span>
    </div>
</div>

<script>
    var ws = new WebSocket('ws://' + location.host + ':9510/chat');
    //添加状态判断，当为OPEN时，发送消息
    if (ws.readyState===1) {
        ws.send('test');
    }else{
        //do something
    }
    ws.onmessage = function (event) {
        var data = event.data;
        data = eval('(' + data + ')');
        if ('systemMsg' in data) {
            var line = document.createElement('div');
            line.className = 'sysMsg';
            line.innerHTML = data.systemMsg;
            document.getElementById('msg').appendChild(line);
        } else if ('onlineNums' in data) {
            document.getElementById('online-nums').innerHTML = data.onlineNums;
        } else {
            var line = document.createElement('div');
            line.innerHTML = '<span>[' + data.nickname + ']</span> ' + data.msg + ' <span class="datetime">' + data.datetime + '</span>';
            document.getElementById('msg').appendChild(line);
        }
    };
    function send(e, input) {
        if (e.charCode == 13) {
            ws.send(input.value);
            input.value = '';
        }
    }
</script>

</body>

</html>