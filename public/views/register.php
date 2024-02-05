<!DOCTYPE html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="public/css/register-style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg" alt="logo">
        </div>
        <div class="register-containter">
            <div class="window-header orange-styled-field">
                &nbspRegister
            </div>
            <form action="register" method="POST">
                <div>
                    <input class="orange-styled-field" name="email" type="text" placeholder=" E-Mail">
                </div>
                <div>
                    <input class="orange-styled-field" name="username" type="text" placeholder=" Username">
                </div>
                <div>
                    <input class="orange-styled-field" name="password" type="password" placeholder=" Password">
                </div>
                <div class="register-button-container">
                    <button type="submit" class="orange-styled-field">Continue</button>
                </div>
         </form>
       </div>
    </div>
</body>