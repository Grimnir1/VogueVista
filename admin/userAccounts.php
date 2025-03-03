<?php
    require 'nav.php';
    require 'database.php';
    if (!$id) {
        header('Location: index.php');
        exit();
    }elseif ($adminStatus !== null) {
        header('Location: productView.php');
        exit();
    }
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);
    $request = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if(isset($_POST['makeAdmin'])){
        $userID = $_POST['userID'];
        $sql = "UPDATE users SET isAdmin = 1 WHERE userID = '$userID'";
        $query = mysqli_query($conn, $sql);
        header('Location: userAccounts.php');

        // echo 'make admin';
    }elseif(isset($_POST['removeAdmin'])){
        $userID = $_POST['userID'];
        $sql = "UPDATE users SET isAdmin = 0 WHERE userID = '$userID'";
        $query = mysqli_query($conn, $sql);
        header('Location: userAccounts.php');

        // echo 'remove admin';
    }
?>


    <section class="container-fluid py-4 mt-5" style="min-height: 60vh;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0">User Management</h2>
                <div class="d-flex gap-3">
                    <div class="search-container">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search users...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card user-table">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead>
                            <tr class="table-header">
                                <th scope="col" style="width: 5%">#</th>
                                <th scope="col" style="width: 22%">User Name</th>
                                <th scope="col" style="width: 22%">Email</th>
                                <th scope="col" style="width: 18%">Date Joined</th>
                                <th scope="col" style="width: 18%">Status</th>
                                <th scope="col" style="width: 15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($request as $users){ ?>
                            <tr class="user-row">
                                <td><?php echo $users['userID'] ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 36px; height: 36px">
                                            <span class="text-secondary"><?php echo substr($users['firstname'], 0, 1) . substr($users['lastname'], 0, 1); ?></span>
                                        </div>
                                        <?php echo $users['firstname']. ' ' . $users['lastname'] ?>
                                    </div>
                                </td>
                                <td><?php echo $users['email']?></td>
                                <td><?php echo date('F j, Y', strtotime($users['dateJoined'])); ?></td>
                                <td>
                                    <?php if($users['isAdmin'] == null){ ?>
                                        <span class="badge bg-primary admin-badge">SuperAdmin</span>
                                    <?php }elseif($users['isAdmin']){ ?>
                                        <span class="badge bg-danger admin-badge">Admin</span>
                                    <?php }else{ ?>
                                        <span class="badge bg-secondary admin-badge">User</span>
                                    <?php }?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <form action="" method="post" onsubmit="return confirm('Are you sure you want to <?php if(!$users['isAdmin']){echo 'add this user as admin';}elseif ($users['isAdmin']) {echo 'remove this user as an Admin';} ?>');" class="d-inline">
                                            <input type="hidden" name="userID" value="<?php echo $users['userID'] ?>">
                                            <?php if($users['isAdmin'] == null){ ?>
                                                
                                            <?php }elseif($users['isAdmin']) {?>
                                                <button type="submit" name="removeAdmin" class="btn btn-sm btn-outline-danger action-btn" title="Remove admin rights">
                                                    <i class="fas fa-user-minus"></i>
                                                </button>
                                            <?php }else{?>
                                            <button type="submit" name="makeAdmin" class="btn btn-sm btn-outline-secondary action-btn" title="Make admin">
                                                <i class="fas fa-user-shield"></i>
                                            </button>
                                            <?php }?>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    require 'footer.php';
?>