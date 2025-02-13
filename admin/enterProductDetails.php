<?php require 'nav.php';?>
<?php
    $productName = $imageUrl = $description = $price = $type = $category = $stock = $rating = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = $_POST["name"];
        $imageUrl = $_POST["imageUrl"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $type = $_POST["type"];
        $category = $_POST["category"];
        $stock = $_POST["stock"];
        $rating = $_POST["rating"];
    }
?>
    <div class="container border bg-light p-5 shadow-sm rounded col-md-5 mt-5 my-5">
        <form action="" method="post">
            <h3 align="center">Add a Product</h3>
            <input 
                type="text" 
                placeholder="Product Name" 
                name="name" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($productName)?>"
            >
            <input 
                type="url" 
                placeholder="imageURl" 
                name="imageUrl" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($imageUrl)?>"
            >
            <input 
                type="text" 
                placeholder="Description" 
                name="description" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($description)?>"
            >
            <input 
                type="price" 
                placeholder="Price" 
                name="price" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($price)?>"
            >
            <input 
                type="text" 
                placeholder="Type" 
                name="type" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($type)?>"
            >

            <select 
                name="category" 
                id="" 
                class="form-select mt-3"
            >
                <option value="">Select Category</option>
                <option value="women">Women</option>
                <option value="men">Men</option>
                <option value="unisex">Unisex</option>
            </select>

            <input 
                type="integer" 
                placeholder="Stock Remaining" 
                name="stock" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($type)?>"
            >
            <input 
                type="text" 
                placeholder="Rating" 
                name="rating" 
                class="form-control mt-3" 
                value="<?php echo htmlspecialchars($rating)?>"
            >
            <button type="submit" class="btn btn-primary mt-3 ms-auto">Post</button>

        </form>
    </div>