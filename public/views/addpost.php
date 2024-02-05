<!DOCTYPE html>
<head>
    <title>Add Post</title>
    <link rel="stylesheet" type="text/css" href="public/css/addpost-style.css?v=<?php echo time(); ?>">
</head>

<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo.svg" alt="logo">
    </div>
    <div class="general-container">

        <div class="window-header orange-styled-field">
            &nbspAdd post
        </div>
        <form action="addPost" method="POST" enctype="multipart/form-data">
            <div>
                <input class="orange-styled-field topic" type="text" name="topic" placeholder="Topic">
            </div>
            <div>
                <textarea class="orange-styled-field content" name="content" placeholder="Content"></textarea>
            </div>
            <div>
                <input type="file" name="file">
            </div>
            <div class="continue-button-container">
                <button  type="submit" class="orange-styled-field">
                    Next >>>
                </button>
            </div>
        </form>
        <div class="redirect-box">
            <a onclick="redirectToURL()">Back <<<</a>
        </div>
    </div>
</div>
<script>
    function redirectToURL() {
        window.location.href = 'http://localhost:8080/getPosts';
    }
</script>
</body>