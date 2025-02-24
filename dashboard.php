<?php 
require 'nav.php';
require 'database.php';

$sql = 'SELECT * FROM producttable';
$query = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($query, MYSQLI_ASSOC); 
?>

<!-- Hero Section -->
<section class="container-fluid  py-5">
    <div style="min-height: 50dvh" class="container align-content-center text-center">
        <h3 class="mb-3">Welcome To VogueVista</h3>   
        <p>Your No.1 destination for trendy and stylish fashion.</p>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="py-5">
    <div class="container ">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="fw-bold mb-4">Our Products</h2>
                <div class="w-50 mx-auto" style="border-bottom:2px solid #711E1E;"></div>
            </div>
        </div>

        <!-- Product Categories -->
        <?php
        $categories = ['men' => 'Male fashion', 'women' => 'Female fashion', 
                      'footwear' => 'Footwear', 'accessories' => 'Accessories'];
        
        foreach ($categories as $category => $title) {
            ?>
            <div class="mb-5 p-5 bg-light shadow-sm rounded">
                <div class="border-bottom border-2 mb-4" style="border-color: #711E1E !important;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold"><?php echo $title; ?></h4>
                        <a href="<?php echo strtolower(str_replace(' ', '', $title)); ?>.php">
                            See More<i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <?php 
                    $count = 0;
                    foreach ($products as $product) {
                        if ($product['category'] === $category && $count < 4) {
                            $count++;
                            ?>
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                                    <a href="productView.php/?id=<?php echo $product['productId']?>" 
                                       class="text-decoration-none">
                                        <div class="position-relative">
                                            <img src="admin/<?php echo $product['imageUrl']; ?>" 
                                                 class="card-img-top" 
                                                 style="height: 300px; object-fit: cover;"
                                                 alt="<?php echo $product['productName']; ?>">
                                            
                                            <div class="position-absolute bottom-0 end-0 m-3 px-3 py-2 rounded-pill text-white"
                                                 style="background-color: #711E1E;">
                                                $<?php echo number_format($product['price'], 2); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body">
                                            <h5 class="card-title text-dark mb-3">
                                                <?php echo $product['productName']; ?>
                                            </h5>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="text-warning">
                                                    <?php
                                                    for($i = 1; $i <= 5; $i++) {
                                                        echo '<i class="bi bi-star' . 
                                                             ($i <= $product['rating'] ? '-fill' : '') . 
                                                             '"></i>';
                                                    }
                                                    ?>
                                                </div>
                                                <span class="text-muted"><?php echo $product['rating']; ?></span>
                                            </div>
                                        </div>
                                    </a>
                                    
                                    <div class="card-footer bg-white border-0 pt-0">
                                        <div class="d-flex gap-2">
                                            <button class="btn flex-grow-1 btn-sm text-white"
                                                    style="background-color: #711E1E;">
                                                <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>

<?php require 'footer.php'; ?>

<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
}

.transition-all {
    transition: all 0.3s ease;
}
</style>