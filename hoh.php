<?php require 'database.php';?>
<?php
    $id = 1;
    $sql = "UPDATE `users` SET `now` = '$id' WHERE `userID` = 1";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "Success";
    }else{
        echo "Failed";
    }
?>