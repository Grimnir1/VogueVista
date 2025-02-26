<?php 
    require 'nav.php';
    require 'database.php';

    $sql = 'SELECT * FROM producttable';
    $query = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($query, MYSQLI_ASSOC);  
?>

<section class="container" style="min-height: 40dvh;">
    <div class="container align-content-center">
        <h3 class="text-center p-3">Products List</h3>
    </div>
    <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="blog-card mt-5 col-md-4 align-content-center" style="min-height: 50dvh;">
                    <div class="card m-auto border shadow" style="width: 70%;">
                        <a href="singleProductView.php/?id=<?php echo $product['productId']?>">
                            <div style="width: 100%;">
                                <img src="<?php echo $product['imageUrl']; ?>" style="width: 100%; object-fit: cover;"  alt="...">
                            </div>
                            <div class="card-body">
                                    <h5 class="card-title p-2"><?php echo $product['productName']; ?></h5>
                                    <div class=" p-2">
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
                                    <h6 class="card-subtitle p-2 mb-2 text-body-secondary">Type: <?php echo $product['type']; ?></h6>
                                    <div class="position-absolute bottom-0 end-0 m-2 px-3 py-2 rounded-pill text-white"
                                                 style="background-color: #711E1E;">
                                                $<?php echo $product['price']; ?>
                                            </div>
                         
                                    <small class="fw-medium p-2 mb-4">Stock: <?php echo $product['stock'] ?></small>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
</section>


<?php require 'footer.php';?>