<?php

    $firstName = $lastName = $password = $confirmPassword = $email = "";
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
</body>
</html>