<?php 
    require 'sessionstart.php';
    require 'database.php';
?>

<?php 
    $id = $_SESSION['user'] ?? null;
    

    $sql2 = "SELECT * FROM users WHERE userID = '$id'";
    $query2 = mysqli_query($conn, $sql2);
    $request = mysqli_fetch_assoc($query2);

    $adminStatus = $request['isAdmin'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Vogue admin</title>
    <link rel="stylesheet" href="style.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        a{
            text-decoration: none;
            color: black;
        }   
    </style>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h4 class="text-white">Vogue Admin</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/voguevista/admin/productView.php">View Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/voguevista/admin/enterProductDetails.php">Add Product</a>
                        </li>
                        <?php if($adminStatus == null){ ?>
                            <li class="nav-item">
                            <a class="nav-link" href="/voguevista/admin/userAccounts.php">Users</a>
                        </li>
                        <?php }?>
                        <li class="nav-item">
                            <a class="nav-link" href="/voguevista/admin/logout.php">Logout</a>
                        </li>
                        

                    </ul>
                </div>
            </div>
        </nav>
    </header>
