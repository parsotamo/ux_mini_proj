<?php
$active_page = basename($_SERVER['PHP_SELF'], ".php");

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' type='text/css' href='assets/css/style.css' />
</head>

<body class="body">

    <header id="header">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">Lab</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($active_page != 'contact') : ?>
                                <li class="nav-item my-4 my-sm-1">
                                    <a href="contact.php" class="contact-btn btn btn-outline">Contact</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item ms-sm-3  my-4 my-sm-1">
                                <a class="nav-link <?php if ($active_page == 'logout') echo 'active'; ?>" href="logout.php"><i class="fas fa-sign-out text-danger"></i></a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item  my-4 my-sm-1">
                                <a class="nav-link <?php if ($active_page == 'login') echo 'active'; ?>" href="login.php">Login</a>
                            </li>
                            <li class="nav-item  my-4 my-sm-1">
                                <a class="nav-link <?php if ($active_page == 'register') echo 'active'; ?>" href=" register.php">Signup</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>