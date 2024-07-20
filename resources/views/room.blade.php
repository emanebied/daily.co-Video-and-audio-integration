<!DOCTYPE html>
<html>
<head>
    <title>Video Call</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .video-container {
            position: relative;
            width: 100%;
            height: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .controls {
            position: absolute;
            bottom: 0px;
            right: 50px;
            display: none;
            gap: 10px;
            background: rgba(255, 255, 255, 0.8);
            padding: 5px;
            border-radius: 5px;
        }
        .control-button {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
        }
        .control-button img {
            width: 20px;
            height: 20px;
        }
        .control-button span {
            font-size: 12px;
        }
        #inviteLink {
            display: none;
        }
    </style>
</head>
<body>
<div class="video-container">
    <iframe
        allow="camera; microphone; fullscreen; display-capture"
        src="{{ $url }}"
        id="videoFrame"
    ></iframe>
    <div class="controls" id="controls">
        <button class="control-button" id="copyLinkBtn">
            <img src="https://cdn-icons-png.flaticon.com/512/724/724954.png" alt="Share Icon">
            <span>Invite</span>
        </button>
    </div>
    <input type="text" id="inviteLink" class="form-control" value="{{ $url }}" readonly>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('videoFrame').addEventListener('load', function() {
        document.getElementById('controls').style.display = 'flex';
    });

    document.getElementById('copyLinkBtn').addEventListener('click', function() {
        var copyText = document.getElementById('inviteLink');
        copyText.style.display = 'block';
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand('copy');
        copyText.style.display = 'none';
        alert('Invite link copied: ' + copyText.value);
    });
</script>
</body>
</html>
