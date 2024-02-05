<!DOCTYPE html>
<head>
    <title>General</title>
    <link rel="stylesheet" type="text/css" href="public/css/general-registered-style.css?v=<?php echo time(); ?>">
</head>

<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo.svg" alt="logo">
    </div>
    <div class="general-container">
        <div class="window-header orange-styled-field">
            &nbspGenerale
        </div>
            <?php
            if (isset($posts)) {
                $i = 0;
                for(; $i < count($posts) && $i < 14; $i = $i + 1){
                    echo '<div class="post">' . '<a href="showpost?id=' . $posts[$i]["id"] . '">' . $posts[$i]["topic"] . '</a>' . '</div>';
                }

                if (isset($is_next_page) && isset($page)) {
                    if ($is_next_page) {
                        echo '<div class="continue-button-container">
                            <button onclick="redirectToURL(' . ($page + 1) . ')" class="orange-styled-field">
                                Next >>>
                            </button>
                         </div>';
                    }
                }

                if (isset($page)) {
                    if ($page > 1) {
                        echo '<div class="continue-button-container">
                            <button onclick="redirectToURL(' . ($page - 1) . ')" class="orange-styled-field">
                                 <<< Back
                            </button>
                         </div>';
                    }
                }

            }
            ?>
    </div>
    <div class="redirect-box">
        <a onclick="redirectToMyProfileURL()">My Profile</a>
        or
        <a onclick="redirectToAddPostURL()">Add Post</a>
        or
        <a onclick="redirectToLogoutURL()">Logout</a>
    </div>
</div>

<script>
    function redirectToURL(page) {
        window.location.href = 'http://localhost:8080/getPosts?page=' + page;
    }
    function redirectToLogoutURL() {
        window.location.href = 'http://localhost:8080/logout';
    }
    function redirectToMyProfileURL(page) {
        window.location.href = 'http://localhost:8080/getPosts?page=' + page;
    }
    function redirectToAddPostURL() {
        window.location.href = 'http://localhost:8080/addPost';
    }
    function redirectToMyProfileURL() {
        window.location.href = 'http://localhost:8080/myProfile';
    }
</script>

</body>