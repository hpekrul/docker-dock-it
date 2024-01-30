
<?php
include "includes/header.php";

$_SESSION['csrf_token'] = $_SESSION['csrf_token'] ?? uniqid();

?>
<?php


/**
 * @var $db mysqli
 */

require_once "includes/database.php";

$categoryID = intval($_GET['id']) ?? '';
$safe_code = mysqli_real_escape_string($db, $categoryID);

$query = "SELECT * FROM ToyCategory WHERE CategoryID = '$safe_code'";
$result = @mysqli_query($db, $query) or die("Error loading toys.");
$category = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<h1>Add Toy</h1>

<?php
if(isset($_POST['add'])) {

    $csrf_token = $_POST['csrf_token'] ?? '';
    if($csrf_token != $_SESSION['csrf_token']){
        die('invalid token');
    }

    //get field values
    $categoryID = $_POST['category_id'] ?? '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $rating = $_POST['rating'] ?? '';
    $review = $_POST['review'] ?? '';
    $user =$_SESSION['authUser']['id'];
    $rating = intval($rating);
    $review = strip_tags($review);


    //todo: validate

    //build the query
    $query = "INSERT INTO `Toy`
(`ToyID`, `CategoryID`, `Name`, `Description`, `BrandID`, `Rating`, `Review`, `CreatedBy`)
VALUES 
    (NUll, '$categoryID', '$name', '$description', '$brand', '$rating', '$review', '$user')";
    echo $query;


    //execute the query
    $result = @mysqli_query($db, $query) or die("error in query."); // . mysqli_error($db) for debugging.

//determine if query was successful
    //if(mysqli_affected_rows($result)){}

    //get id of record just added
    $newToyId = mysqli_insert_id($db);

    // redirect to the city page
    if($newToyId) {
        header('Location: toydetails.php?id=' . $categoryID);
    }
}
?>

<form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Category</label>
        <input type="text" class="form-control" id="toy" disabled value="<?= $category['Name'] ?>">
        <input type="hidden" name="category_id" value="<?= $category['CategoryID'] ?>">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Toy Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <?php
        $query = "SELECT BrandID, Name FROM Brand ORDER BY Name";
        $result = @mysqli_query($db, $query);
        ?>
        <label for="brand" class="form-label">Brand</label>
        <select name="brand" id="brand" class="form-select">
            <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                echo "<option value='{$row['BrandID']}'>{$row['Name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Review</label>
        <input type="text" class="form-control" id="review" name="review" required>
    </div>
    <div class="mb-3">
        <label for="user" class="form-label">Created By</label>
        <input type="text" readonly class="form-control"  value="<?php if($_SESSION['authUser']) echo $_SESSION['authUser']['email']  ?>">
    </div>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <button type="submit" name="add" class="btn btn-primary">Add Toy</button>
</form>



<?php
//close the database connection (put in footer)
mysqli_close($db);
?>
<?php
include "includes/footer.php"; ?>
