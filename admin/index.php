<?php
    $userName = $password = '';

   
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
    <section class="container-fluid align-content-center " style="min-height: 100vh;">
        <div class="container col-md-4 border bg-light p-5 shadow-lg rounded mt-5">
            <h2 class="text-center">VogueVista Admin Panel</h2>
            <div>
                <form action="" method="post">
                    <input 
                        type="character" 
                        placeholder="Username" 
                        name="userName" 
                        class="form-control mt-3" 
                        value="<?php echo htmlspecialchars($userName)?>"
                        required
                    >
                    <input 
                        type="password" 
                        placeholder="Password" 
                        name="password" 
                        class="form-control mt-3" 
                        value="<?php echo htmlspecialchars($password)?>"
                        required
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