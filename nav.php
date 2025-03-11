<?php require 'sessionstart.php';?>
<?php

    $id = $_SESSION['user'] ?? null;
    // echo $_SESSION['user'];
    // echo $_SESSION['username'];
require 'database.php';

    $sql = "SELECT * FROM cart WHERE user = '$id'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Vogue Vista</title>
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");
        .blog-card{
            height: 70dvh;
        }
        .logoImg{
            display: block;
            width: 100px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        /* .productImage{
            display: block;
            width: 50%;
        } */
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <a class="navbar-brand" href="#">
                    <img src="logo.jpg" class="logoImg" alt="">
                </a>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://localhost/VogueVista/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/VogueVista/<?php echo $id ? 'logout.php': 'login.php'  ?>"><?php echo $id ? 'logout': 'login'  ?></a>
                        </li>
                    </ul>
                </div>
                <div>
                    </div>
                    
                    <button type="button" class="btn  position-relative">  
                        <i class="bi bi-cart
                        "></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-secondary"><?php echo $count; ?></span>
                    </button>
            </div>
        </nav>
    </header>
