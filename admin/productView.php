<?php 
    require 'nav.php';
    require 'database.php';

    $sql = 'SELECT * FROM producttable';
    $query = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($query, MYSQLI_ASSOC);  
?>

<section class="container" style="min-height: 40dvh;">
    <div class="container align-content-center">
        <h3 class="text-center p-3">Products view</h3>
    </div>
    <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="blog-card mt-5 col-md-4 align-content-center" style="min-height: 50dvh;">
                    <div class="card m-auto border shadow" style="width: 70%;">
                        <div style="width: 100%;">
                            <img src="<?php echo $product['imageUrl']; ?>" style="width: 100%; object-fit: cover;"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title p-2"><?php echo $product['productName']; ?></h5>
                            <h6 class="card-subtitle p-2 mb-2 text-body-secondary">Type: <?php echo $product['type']; ?></h6>
                            <p class="card-text p-2 mb-1"><?php echo $product['description'] ?></p>
                            <small class="fw-medium p-2 mb-4">Stock: <?php echo $product['stock'] ?>| Rating: <?php echo $product['rating'] ?>|Price :$<?php echo $product['price'] ?></small>
                            <button class="btn btn-danger border-0 ms-auto">Edit</button>
                            <button class="btn btn-danger border-0 ms-auto">Delete</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</section>


<?php require 'footer.php';?>