<!DOCTYPE html>
<head>
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="public/css/login-style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
    <div class="logo">
        <img src="public/img/logo.svg" alt="logo">
    </div>
        <div class="auth-failure">
            <?php
            if (isset($messages)) {
                    echo $messages;
            }
            ?>
        </div>
        <div class="login-container">
            <div class="window-header orange-styled-field">
                &nbspSign in
            </div>
        <form class="login" action="login" method="POST">
            <div class="messages">
            </div>
            <div>
                <input class="orange-styled-field" name="email" type="text" placeholder=" E-Mail">
            </div>
            <div>
                <input class="orange-styled-field" name="password" type="password" placeholder=" Password">
            </div>
            <div class="login-button-container">
                <button type="submit" class="orange-styled-field">
                    Continue
                </button>
            </div>
        </form>
    </div>
    </div>
</body>