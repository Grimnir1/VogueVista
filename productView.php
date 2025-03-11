<?php 
    require 'nav.php';
    require 'database.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM producttable WHERE productId = $id";
        $query = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($query);
    }  

    if (isset($_POST['addToCart'])) {
        $id = $_SESSION['user'];
    
        if (!$id) {
            header('Location: login.php');
            exit();
        }else{
            $productId = $_POST['productId'];
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
    
            $sql2 = "SELECT * FROM cart WHERE product_id = $productId ";
            $query2 = mysqli_query($conn, $sql2);
    
    
            if (mysqli_num_rows($query2) > 0) {
                $sql = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = $productId";
                $query = mysqli_query($conn, $sql);
                // echo "Product quantity updated to cart";
            }else{
                $sql = "INSERT INTO `cart` (`user`, `product_id`, `quantity`) VALUES ('$id', '$productId', '$quantity')";
                $query = mysqli_query($conn, $sql);
                // echo "Product to cart";
            }
            // header("Location: ");
            // exit();
        }
    
    }
?>

<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/VogueVista/dashboard.php" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="products.php" class="text-decoration-none">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $product['productName']; ?></li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-md-6">
                <div class="position-relative">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="../admin/<?php echo $product['imageUrl']; ?>" 
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
                            
                        </div>

                        <form action="" method="post">
                            <input type="hidden" name="productId" value="<?php echo $product['productId']; ?>">
                            <div class="card-footer bg-white border-0 pt-0">
                                <div class="d-flex gap-2">
                                    <button type="submit" name="addToCart" class="btn flex-grow-1 btn-sm text-white"
                                            style="background-color: #711E1E;">
                                        <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'footer.php';?> 