<?php
    include("database.php");

    $firstName = $lastName = $password = $confirmPassword = $email = "";  

    $error = [
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'password' => '',
        'confirmpassword' => '',
    ];
    $errors = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstName = mysqli_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_escape_string($conn, $_POST['lastName']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        $confirmPassword = mysqli_escape_string($conn, $_POST['confirmPassword']);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);

        if (empty($firstName)) {
            $errors = '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Please Enter your Firstname 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            
        }elseif (empty($lastName)) {
            $errors = '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Please Enter your lastname 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            
        }elseif (empty($email)) {
            $errors = '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Please Enter your email 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            
        
        }elseif (empty($password)) {
            $errors = '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Please Enter your password 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            
        }elseif(strlen($password) < 8){
            $errors ='
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Password is too short
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
            ';
        }elseif (empty($confirmPassword)) {
            $errors = '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Please Enter your confirmPassword 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            
        }elseif ($password !== $confirmPassword) {
            $errors = '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Passwords do not match 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
            
        }else{
                if(mysqli_num_rows($query) > 0){
                    $errors ='
                        <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                            Email already exists
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                ';}
                else{


                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql =" INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`) VALUE ('$firstName', '$lastName', '$email', '$hashed_password')";

                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        header('Location: index.php');
                        exit();
                    }
                }

        };
    };
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Vogue Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section class="container-fluid align-content-center" style="min-height: 100vh;">
        <div class="container col-md-4 border bg-light p-5 shadow-sm rounded mt-5">
            <div><?php echo $errors;?></div>
            <h2 class="text-center">Sign Up</h2>
            <div>
                <form action="" method="post">
                    <input 
                        type="character" 
                        placeholder="Firstname" 
                        name="firstName" 
                        class="form-control mt-3" 
                        value="<?php echo htmlspecialchars($firstName)?>"
                    >
                    <input 
                        type="character" 
                        placeholder="Lastname" 
                        name="lastName" 
                        class="form-control mt-3" 
                        value="<?php echo htmlspecialchars($lastName)?>"
                    >

                    <input 
                        type="email" 
                        placeholder="Email" 
                        name="email" 
                        required
                        class="form-control mt-3" 
                        value="<?php echo htmlspecialchars($email)?>"
                    >
                    <input 
                        type="password" 
                        placeholder="Password" 
                        name="password" 
                        class="form-control mt-3" 
                        value="<?php echo htmlspecialchars($password)?>"
                    >
                    <input 
                        type="password" 
                        placeholder="Confirm Password" 
                        name="confirmPassword" 
                        class="form-control mt-3" 
                        value="<?php echo htmlspecialchars($confirmPassword)?>"
                    >
                    <div class="justify-content-center">
                        <button type="submit" class="btn btn-primary mt-3 ms-auto">signup</button>
                    </div>

                </form>
            </div>
        </div>
    </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>