<?php
    require 'nav.php';
    include("database.php");
    
    $message = '';

    $productName = $description = $price = $type = $category = $stock = $rating = "";

    $errors = [
        'productName' => '',
        'description' => '',
        'price' => '',
        'type' => '',
        'category' => '',
        'rating' => '',
        'stock' => '',

    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = mysqli_real_escape_string($conn, $_POST["productName"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $type = mysqli_real_escape_string($conn, $_POST["type"]);
        $category = mysqli_real_escape_string($conn, $_POST["category"]);
        $stock = mysqli_real_escape_string($conn, $_POST["stock"]);
        $rating = mysqli_real_escape_string($conn, $_POST["rating"]);
        $target_dir = "uploads/";
        $image = $_FILES['image'];
        $imageName = $image["name"];
        $tempName = $image["tmp_name"];
        $imageSize = $image["size"];
        $imageError = $image["error"];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowed =['jpg', 'jpeg', 'png', 'svg'];

       
        if (empty($productName)) {
            $errors['productName']= "This field is empty";
        }elseif(empty($description)){
            $errors['description']= "This field is empty";
        }elseif(empty($price)){
            $errors['price']= "This field is empty";
        }elseif(empty($type)){
            $errors['type']= "This field is empty";
        }elseif(empty($category)){
            $errors['category']= "This field is empty";
        }elseif(empty($stock)){
            $errors['stock']= "This field is empty";
        }elseif(empty($rating)){
            $errors['rating']= "This field is empty";
        }else{
            
            if ($imageError === 0) {
                if (in_array($imageExt, $allowed)) {
                    $newImageName = time() . "." . $imageExt;
                    $target_image = $target_dir . $newImageName;
                    if(move_uploaded_file($tempName, $target_image)) {
                        $imageUrl = $target_image;
                        $sql = "INSERT INTO `producttable` (`productName`, `imageUrl`, `description`, `price`, `type`, `category`, `stock`, `rating`) VALUES ('$productName', '$imageUrl', '$description', '$price', '$type', '$category', '$stock', '$rating')";
                        if (mysqli_query($conn, $sql)) {
                            $message ='
                                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                                    Product added successfully
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
                            $productName = $description = $price = $type = $category = $stock = $rating = "";
                        } else {
                            $message ='
                                <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
                                    Failed to add product 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
                        }
            }    

                }else {
                    $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                Invalid file path
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
            }else{
                $message = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                Error Uploading Image
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
            };

                    
    }
};

?>
    <div class="container border bg-light p-5 shadow-sm rounded col-md-5 mt-5 my-5">
        <form action="" method="post" enctype="multipart/form-data">
            <?php echo $message; ?>
            <h3 align="center">Add a Product</h3>
            <input 
                type="text" 
                placeholder="Product Name" 
                name="productName" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($productName)?>"
            >
            <small class="text-danger"><?php echo $errors['productName']; ?></small>

            <input 
                type="text" 
                placeholder="Description" 
                name="description" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($description)?>"

            >
            <small class="text-danger"><?php echo $errors['description']; ?></small>
            <input 
                type="decimal" 
                placeholder="Price" 
                name="price" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($price)?>"

            >
            <small class="text-danger"><?php echo $errors['price']; ?></small>

            <input 
                type="text" 
                placeholder="Type" 
                name="type" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($type)?>"
            >
            <small class="text-danger"><?php echo $errors['type']; ?></small>

            <select 
                name="category" 
                id="" 
                class="form-select mt-3"

            >
                <option value="">Select Category</option>
                <option value="women">Women</option>
                <option value="men">Men</option>
                <option value="unisex">Unisex</option>
                <option value="accessories">Accessories</option>
                <option value="footwear">Footwear</option>
            </select>
            <small class="text-danger"><?php echo $errors['category']; ?></small>

            <input 
                type="number" 
                placeholder="Stock Remaining" 
                name="stock" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($stock)?>"

            >
            <small class="text-danger"><?php echo $errors['stock']; ?></small>

            <input 
                type="decimal" 
                placeholder="Rating" 
                name="rating" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($rating)?>"

            >
            <input 
                type="file"
                name="image" 
                class="form-control mt-3"

            >
            <small class="text-danger"><?php echo $errors['rating']; ?></small>
            <button type="submit" class="btn btn-primary mt-3 ms-auto">Add Product</button>

        </form>
    </div>

    <?php require 'footer.php';?>
    

