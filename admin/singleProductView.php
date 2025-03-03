<?php 
    require 'nav.php';

    $id = $_SESSION['user'];
    if (!$id ) {
        header('Location: ../index.php');
        exit();
    }

    require 'database.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM producttable WHERE productId = $id";
        $query = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($query);
    }  



    if(isset($_POST['delete'])) {
        delete();
    }
    
    function delete() {
        require 'database.php';
        $confirm = '<script>confirm("Are you sure you want to delete this product?")</script>';
        $id = $_GET['id'];
        echo $confirm;

        if ($confirm == false) {

        }else {
            $sql = "DELETE FROM producttable WHERE productId = $id";
            $query = mysqli_query($conn, $sql);
            header('Location: ../productView.php');
            exit();
        };
    }
?>

<?php if($adminStatus == null || $adminStatus == true){ ?>
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://localhost/VogueVista/admin/productView.php" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="/voguevista/admin/products.php" class="text-decoration-none">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $product['productName']; ?></li>
                </ol>
            </nav>

            <div class="row g-5">
                <div class="col-md-6">
                    <div class="position-relative">
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                            <img src="../<?php echo $product['imageUrl']; ?>" 
                                class="img-fluid" 
                                style="height: 500px; object-fit: cover;" 
                                alt="<?php echo $product['productName']; ?>">
                        </div>
                        <?php if($product['stock'] < 10): ?>
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-warning">Low Stock</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h2 class="fw-bold mb-2"><?php echo $product['productName']; ?></h2>
                                <span class="badge bg-primary"><?php echo $product['type']; ?></span>
                            </div>
                            <div class="text-end">
                                <h3 class="text-primary mb-0">$<?php echo number_format($product['price'], 2); ?></h3>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <?php
                                        $rating = $product['rating'];
                                        for($i = 1; $i <= 5; $i++) {
                                            if($i <= $rating) {
                                                echo '<i class="bi bi-star-fill text-warning"></i>';
                                            } else {
                                                echo '<i class="bi bi-star text-warning"></i>';
                                            }
                                        }
                                    ?>
                                </div>
                                <span class="text-muted"><?php echo $rating; ?> out of 5</span>
                            </div>

                            <div class="mb-4">
                                <h5 class="fw-bold mb-3">Description</h5>
                                <p class="text-muted"><?php echo $product['description']; ?></p>
                            </div>

                            <div class="d-flex align-items-center mb-4">
                                <div class="me-4">
                                    <span class="text-muted">Stock Status:</span>
                                    <span class="fw-bold ms-2"><?php echo $product['stock']; ?> units</span>
                                </div>
                                <div class="vr"></div>
                                <div class="ms-4">
                                    <span class="text-muted">Product ID:</span>
                                    <span class="fw-bold ms-2">#<?php echo str_pad($id, 5, '0', STR_PAD_LEFT); ?></span>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <form action="" class="align-items-center flex-grow-1" method="post">
                                    <button type="submit" name="delete" class="btn btn-danger w-25 flex-grow-1 border-0 ms-auto">
                                        <i class="bi bi-trash me-1"></i>
                                    </button>
                                    <button type="submit" name="edit" class="btn w-25 btn-danger">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }else{?>
    <section class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 60dvh; ">
        <div class="d-flex align-items-center justify-content-center" style="min-height: 50dvh; color:#711E1E; width: 100%;">
            <div class="container text-center">
                <h3 class="p-3">VogueVista</h3>
                <p class="p-3">You do not have access to this page:</p>
                <p class="p-3">You are not an admin</p>
            </div>
        </div>
    </section>
<?php }?>



<?php require 'footer.php';?> 