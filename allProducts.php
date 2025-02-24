<?php 
    require 'nav.php';
    require 'database.php';

    $sql = 'SELECT * FROM producttable';
    $query = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    
  
?>

<section class="container-fluid mt-5 align-content-center" style="min-height: 50dvh;">
        <div class="container align-content-center" style="min-height: 40dvh; ">
            <h3 class="text-center p-3">Welcome To VogueVista</h3>   
            <p class="text-center p-3">Your No.1 destination for trendy and stylish fashion.</p>
        </div>
    </section>

<section id="products" class="py-5"     >
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="fw-bold mb-4">Our Products</h2>
                <div style="border-bottom:2px solid  #711E1E;" class="w-50 mx-auto border-2"></div>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($products as $product) { ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                        <a href="productView.php/?id=<?php echo $product['productId']?>" 
                           class="text-decoration-none">
                            <div class="position-relative">
                                <img src="admin/<?php echo $product['imageUrl']; ?>" 
                                     class="card-img-top" 
                                     style="height: 300px; object-fit: cover;"
                                     alt="<?php echo $product['productName']; ?>">
                                
                                <div style="background-color:brown;" class="position-absolute bottom-0 end-0 text-white px-3 py-2 m-3 rounded-pill">
                                    $<?php echo number_format($product['price'], 2); ?>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <h5 class="card-title text-dark mb-3"><?php echo $product['productName']; ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-warning">
                                        <?php
                                            $rating = $product['rating'];
                                            for($i = 1; $i <= 5; $i++) {
                                                if($i <= $rating) {
                                                    echo '<i class="bi bi-star-fill"></i>';
                                                } else {
                                                    echo '<i class="bi bi-star"></i>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <span class="text-muted"><?php echo $rating; ?></span>
                                </div>
                            </div>
                        </a>
                        
                        <div class="card-footer bg-white border-0 pt-0">
                            <div class="d-flex gap-2">
                                <button style="background-color: #711E1E; color:white; " class="btn flex-grow-1 btn-sm">
                                    <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-heart"></i>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require 'footer.php';?>

<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}

.transition-all {
    transition: all 0.3s ease;
}
</style>