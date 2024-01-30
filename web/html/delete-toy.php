<?php


/**
 * @var $db mysqli
 */
include "includes/header.php";

require_once "includes/database.php";


$toyID = $_GET['id'] ?? '';
$safe_code = mysqli_real_escape_string($db, $toyID);

$query = "SELECT * FROM Toy WHERE ToyID = '$safe_code'";
$result = @mysqli_query($db, $query) or die("Error loading toys.");
$toy = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<h1>Delete Toy</h1>
<?php
if(isset($_POST['delete'])) {


    //get field values
    $categoryID = $_POST['category_id'] ?? '';
    $toyID = $_POST['toy_id'] ?? '';

    //build the query
    $query = "DELETE FROM `Toy` 
                   WHERE `Toy`.`ToyID` = $toyID";

    echo $query;
    $result = @mysqli_query($db, $query) or die("error in query.");

    header('Location: toydetails.php?id=' . $categoryID);
}
if(isset($_POST['cancel'])) {

    //get field values
    $categoryID = $_POST['category_id'] ?? '';

    header('Location: toydetails.php?id=' . $categoryID);
}

?>

<form method="post">
    <p>Are you sure you want to delete <b><?= $toy['Name'] ?></b>?</p>
    <input type="hidden" name="toy_id" value="<?= $toy['ToyID'] ?>">
    <input type="hidden" name="category_id" value="<?= $toy['CategoryID'] ?>">

    <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
    <button type="submit" name="delete" class="btn btn-primary">Delete</button>
</form>




<?php
//close the database connection (put in footer)
mysqli_close($db);
?>
<?php include "includes/footer.php"; ?>
