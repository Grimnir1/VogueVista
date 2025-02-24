<?php
    include("database.php");

    $email = $password = '';
    $error ='';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($email) ){
            $error ='
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Email field is Empty
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
            ';
        }elseif(empty($password)){
            $error = '
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Password field is empty
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
            ';
        }else{
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
            $request = mysqli_fetch_assoc($query);
            
            $loginpword = $request['password'];

                if ($password == $loginpword) {
                    header('Location: dashboard.php');
                    exit();
                    $email = $password = '';    
                }else {
                    $error = '
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Incorrect Password
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
            ';
                }
        }else{
            $error = '
                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Invalid Credentials
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
        };

        };
    };
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>VogueVista Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section class="container-fluid align-content-center " style="min-height: 100vh;">
        <div class="container col-md-4 border bg-light p-5 shadow-lg rounded mt-5">
            <?php echo $error?>
            <h2 class="text-center">VogueVista Admin Panel</h2>
            <div>
                <form action="" method="POST">
                    <input 
                        type="character" 
                        placeholder="Email" 
                        name="email" 
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
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mt-5">
                            <a href="signup.php" class="mt-3">Create an account</a>
                        </div>
                        <div class=" ms-auto align-self-end">
                            <button type="submit" class="btn btn-primary mt-3 ms-auto">Login</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>
</html>