<?php
session_name('hpekrul_final');
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wocky's Toys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="wrapper">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Wocky's Toys</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link"  href="index.php">Home</a>
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link" href="toys.php">Toys</a>
                    <a class="nav-link" href="admin.php">Admin</a>
                </div>
            </div>
            <div class="text-dark">
                <?php
                if(isset($_SESSION['authUser']) && $_SESSION['authUser']){
                    echo 'Welcome ' . $_SESSION['authUser']['email'] .
                        ' (<a href="login.php?logout"> Logout </a>)';
                }else{
                    echo '<a href="login.php">Login</a>';
                }
                ?>
            </div>
        </div>
    </nav>

