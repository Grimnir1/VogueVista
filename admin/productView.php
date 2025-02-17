<?php require 'nav.php';?>

<section class="container" style="min-height: 40dvh;">
    <div class="container align-content-center">
        <h3 class="text-center p-3">Products view</h3>
    </div>
    <div class="row">
            <?php foreach ($products as $blog) { ?>
                <div class="blog-card col-md-4 align-content-center" style="min-height: 50dvh;">
                    <div class="card m-auto border" style="width: 70%;">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo $blog['image']; ?>" class="card-img-top productImage" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title p-2"><?php echo $blog['name']; ?></h5>
                            <h6 class="card-subtitle p-2 mb-2 text-body-secondary">Tags: <?php echo $blog['type'] . ", " . $blog['category']; ?></h6>
                            <p class="card-text p-2 mb-1"><?php echo $blog['description'] ?></p>
                            <small class="fw-medium p-2 mb-4">Stock: <?php echo $blog['stock'] ?>| Rating: <?php echo $blog['rating'] ?>| <button class="btn btn-danger border-0 ms-auto">$<?php echo $blog['price'] ?></button></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</section>


<?php require 'footer.php';?>