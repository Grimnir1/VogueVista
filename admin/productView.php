<?php 
    require 'nav.php';
    require 'database.php';

    $sql = 'SELECT * FROM producttable';
    $query = mysqli_query($conn, $sql);
    $products = [];  

    while($row = mysqli_fetch_assoc($query)) {
        $products[] = $row;
    }

?>

<section class="container" style="min-height: 40dvh;">
    <div class="container align-content-center">
        <h3 class="text-center p-3">Products view</h3>
    </div>
    <div class="row">
            <?php foreach ($products as $product) { ?>
                <div class="blog-card mt-5 col-md-4 align-content-center" style="min-height: 50dvh;">
                    <div class="card m-auto border" style="width: 70%;">
                        <div class="d-flex joj justify-content-center">
                            <img src="<?php echo $product['imageUrl']; ?>" class="card-img-top productImage" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title p-2"><?php echo $product['productName']; ?></h5>
                            <h6 class="card-subtitle p-2 mb-2 text-body-secondary">Tags: <?php echo $product['type']; ?></h6>
                            <p class="card-text p-2 mb-1"><?php echo $product['description'] ?></p>
                            <small class="fw-medium p-2 mb-4">Stock: <?php echo $product['stock'] ?>| Rating: <?php echo $product['rating'] ?>|Price :$<?php echo $product['price'] ?>| <button class="btn btn-danger border-0 ms-auto">Edit</button></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</section>


<?php require 'footer.php';?>