<?php
include "includes/header.php";
if(isset($_SESSION['authUser']) and $_SESSION['authUser']):

/**
 * @var $db mysqli
 */

require_once "includes/database.php";



$categoryID = $_GET['id'] ?? '';
    $safe_code = mysqli_real_escape_string($db, $categoryID);

$query = "SELECT * FROM ToyCategory WHERE CategoryID = '$safe_code'";
$result = @mysqli_query($db, $query) or die("Error loading toys.");
$toy = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<?php

$sort = $_GET['sort'] ?? 'Name';
$dir = $_GET['dir'] ?? 'ASC';

$safe_code = mysqli_real_escape_string($db, $categoryID);
$sort = in_array($sort, ['Name', 'Description', 'Brand', 'Rating', 'Review']) ? $sort : 'Name';
$dir = in_array($dir, ['ASC', 'DESC']) ? $dir : 'ASC';

$query = "SELECT CategoryID, Toy.Name AS Name, Description, Brand.Name AS Brand, Rating, Review, ToyID, authUsers.email AS email 
FROM `Toy`
JOIN Brand on Toy.BrandID = Brand.BrandID
JOIN authUsers ON Toy.CreatedBy = authUsers.id
WHERE CategoryID = '$safe_code'
ORDER BY $sort $dir";


$result = @mysqli_query($db, $query) or die("error in query.");

$total_rows = mysqli_num_rows($result);
echo "<h1>Toys</h1>";
echo "<p>Found $total_rows toys. </p>";

?>

<table class="table table-striped table-bordered table-rows" id="product_table">
    <thead>
    <tr>
        <th><a href="?id=<?= $categoryID ?>&sort=Name&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Name</a></th>
        <th><a href="?id=<?= $categoryID ?>$sort=Description&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Description</a>
        <th><a href="?id=<?= $categoryID ?>&sort=Brand&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Brand</a></th>
        <th><a href="?id=<?= $categoryID ?>&sort=Rating&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Rating</a></th>
        <th>Review</th>
        <th><a href="?id=<?= $categoryID ?>&sort=email&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Created By</a></th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>';
        echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
        echo '<td>' . $row['Description'] . '</td>';
        echo '<td>' . $row['Brand'] . '</td>';
        echo '<td>' . implode(array_fill(0, $row['Rating'], '&starf;'))
            . implode(array_fill(0, 5-$row['Rating'], '&star;')) .'</td>';
        echo '<td>' . $row['Review'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';

        if ($_SESSION['authUser']['role'] == '2'):
        echo "<td><a href='edit-toy.php?id={$row['ToyID']}' class='btn btn-secondary'>Edit</a>
        <a href='delete-toy.php?id={$row['ToyID']}' class='btn btn-danger'>Delete</a> </td>";
        endif;
        echo '</tr>';
    }
    ?>


    </tbody>
</table>
<?php if($_SESSION['authUser']['role'] == '2'): ?>
<a href="add-place.php?id=<?= $categoryID ?>" class="btn btn-primary">Add Toy</a>
<?php endif; ?>
    <?php
     else: ?>
    <div class="container">
        <h1>Admin Area</h1>
        <div class="alert alert-danger">Access denied. Please <a href="login.php">login</a>.</div>
    </div>
    <?php
    ?>

<?php
//close the database connection (put in footer)
mysqli_close($db);

?>
<?php
endif; include "includes/footer.php"; ?>
