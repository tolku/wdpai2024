<!DOCTYPE html>
<head>
    <title>Post</title>
    <link rel="stylesheet" type="text/css" href="public/css/showpost-style.css">
</head>

<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo.svg" alt="logo">
    </div>
    <div class="general-container">
        <div class="window-header orange-styled-field">
            &nbspPost
        </div>
        <div class="orange-styled-field topic">
            <?php
                if (isset($post)) {
                    echo 'TOPIC: ' . $post[0]["topic"];
                }
            ?>
        </div>
        <div class="orange-styled-field content">
            <?php
                if (isset($post)){
                    echo 'CONTENT: ' . $post[0]["content"];
                }
            ?>
        </div>
    </div>
    <div class="redirect-box">
        <a href="getPosts">Back <<<</a>
    </div>
</div>
</body>