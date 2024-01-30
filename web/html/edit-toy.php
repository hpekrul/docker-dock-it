<?php
include "includes/header.php";

$_SESSION['csrf_token'] = $_SESSION['csrf_token'] ?? uniqid();
?>
<?php





/**
 * @var $db mysqli
 */

require_once "includes/database.php";


if(isset($_POST['update'])) {

    $csrf_token = $_POST['csrf_token'] ?? '';
    if($csrf_token != $_SESSION['csrf_token']){
        die('invalid token');
    }


//get field values
    $categoryID = $_POST['category_id'] ?? '';
    $toyID = $_POST['toy_id'] ?? '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $rating = $_POST['rating'] ?? '';
    $review = $_POST['review'] ?? '';
    $user = $_POST['user'] ?? '';

    $rating = intval($rating);
    $review = strip_tags($review);


//build the query
    $query = "UPDATE `Toy` 
SET `ToyID` = ?,
    `Name` = ?,
    `Description` = ?,
    `BrandID` = ?,
        `Rating` = ?,
        `Review` = ?
WHERE `Toy`.`ToyID` = ?;";

    $stmt = @mysqli_prepare($db, $query) or die('Error Loading Query');
    mysqli_stmt_bind_param($stmt, 'issiisi', $toyID, $name, $description, $brand, $rating, $review, $toyID);
    $result = @mysqli_stmt_execute($stmt) or die('error updating');

//    $result = @mysqli_query($db, $query) or die("error in query.");

    header('Location: toydetails.php?id=' . $categoryID);
}

$toyID = $_GET['id'] ?? '';
$safe_code = mysqli_real_escape_string($db, $toyID);

$query = "SELECT * FROM Toy WHERE ToyID = '$safe_code'";
$result = @mysqli_query($db, $query) or die("Error loading toys.");
$toy = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>


<h1>Edit Toy</h1>

<form method="post">
    <div class="mb-3">
        <?php
        $query = "SELECT ToyID, Name, Description, Rating, Review FROM Toy ORDER BY Name";
        $result = @mysqli_query($db, $query) or die('Error in query');
        ?>

        <label for="category_id" class="form-label">Toy</label>
        <input type="hidden" name="category_id" value="<?= $toy['CategoryID'] ?>">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $toy['Name'] ?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"><?= $toy['Description'] ?></textarea>
    </div>
    <div class="mb-3">
        <?php
        $query = "SELECT BrandID, Name FROM Brand ORDER BY Name";
        $result = @mysqli_query($db, $query) or die('Error in query');
        ?>
        <label for="brand" class="form-label">Brand</label>
        <select name="brand" id="brand" class="form-select">
            <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $selected = $row['BrandID'] == $toy['BrandID'] ? ' selected ' : '';
                echo "<option value='{$row['BrandID']}' $selected>{$row['Name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <input type="number" class="form-control" id="rating" name="rating" min="0" max="5" value="<?= $toy['Rating'] ?>">
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Review</label>
        <input type="text" class="form-control" id="review" name="review" value="<?= $toy['Review'] ?>">
    </div>

    <input type="hidden" name="toy_id" value="<?= $toy['ToyID'] ?>">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <button type="submit" name="update" class="btn btn-primary">Update Toy</button>
</form>









<?php
//close the database connection (put in footer)
mysqli_close($db);
?>
<?php include "includes/footer.php"; ?>
