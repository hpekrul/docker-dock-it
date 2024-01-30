<?php
include "includes/header.php";

if(isset($_SESSION['authUser']) and $_SESSION['authUser']):

/**
 *@var $db mysqli
 */

require_once "includes/database.php";



$sort = $_GET['sort'] ?? 'Name';
$dir = $_GET['dir'] ?? 'ASC';
$start = $_GET['start'] ?? 0;
$per_page = $_GET['per_page'] ?? 5;
$search_term = $_GET['search_term'] ?? '';
$search_term_sql = "%$search_term%";

$sort = in_array($sort, ['Name']) ? $sort : 'Name';
$dir = in_array($dir, ['ASC', 'DESC']) ? $dir : 'ASC';

$query = "SELECT CategoryID, Name
FROM `ToyCategory`
WHERE Name LIKE ?
ORDER BY $sort $dir";


    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $search_term_sql);
    mysqli_stmt_bind_result($stmt,  $CategoryID, $Name);
    $result = @mysqli_stmt_execute($stmt) or die('error updating');
    mysqli_stmt_store_result($stmt);
$total_rows = mysqli_stmt_num_rows($stmt);
echo "<h1>Toy Categories</h1>";
echo "<p>Found $total_rows Categories. </p>";



$query .= " LIMIT $start, $per_page";
    $stmt2 = mysqli_prepare($db, $query);

    mysqli_stmt_bind_param($stmt2, "s", $search_term_sql);
    mysqli_stmt_bind_result($stmt2,  $CategoryID, $Name);
    $result = @mysqli_stmt_execute($stmt2) or die('error updating');

?>
<form method="get" class="pagination">
    <label>Select Per Page:</label>
    <select name="per_page" onchange="this.form.submit()">
        <option value="5" <?= $per_page == 5? 'selected' : '' ?>>5</option>
        <option value="10" <?= $per_page == 10? 'selected' : '' ?>>10</option>
        <option value="20" <?= $per_page == 20? 'selected' : '' ?>>20</option>
    </select>
</form>
<form method="get" class="search">
    <input type="text" name="search_term" aria-label="Search" placeholder="Search Categories.. " value="<?= $search_term ?>">
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<table class="table table-striped table-bordered table-rows" id="product_table">
    <thead>
    <tr>
        <th><a href="?sort=Name&dir=<?= $dir === 'ASC' ? 'DESC' : 'ASC'?>">Category</a></th>
    </tr>
    </thead>
    <tbody>

    <?php
    while(mysqli_stmt_fetch($stmt2)) {
        echo '<tr>';
        echo '<td><a href="toydetails.php?id=' . $CategoryID . '">' . $Name . '</a></td>';
        echo '</tr>';
    }
    ?>


    </tbody>
</table>
<nav aria-label="Country pagination">
    <ul class="pagination">
        <li class="page-item <?= $start == 0 ? 'disabled' : '' ?>">
            <a class="page-link" href="?per_page=<?= $per_page ?>&sort=<?= $sort ?>&start=<?= $start - $per_page ?>">Previous</a>
        </li>
        <?php
        for($i = 0; $i < $total_rows; $i += $per_page){
            ?>
            <li class="page-item <?= $i == $start ? 'active' : '' ?>">
                <a class="page-link" href="?per_page=<?= $per_page ?>&sort=<?= $sort ?>&start=<?= $i?>"><?= $i / $per_page + 1 ?></a>
            </li>
            <?php
        }
        ?>
        <li class="page-item <?= $total_rows <  $start + $per_page ? 'disabled' : '' ?>">
            <a class="page-link" href="?per_page=<?= $per_page ?>&sort=<?= $sort ?>&start=<?= $start + $per_page ?>">Next</a>
        </li>
    </ul>
</nav>



<?php
//close the database connection (put in footer)
mysqli_close($db);
?>
<?php else: ?>
    <div class="container">
        <h1>User Area</h1>
        <div class="alert alert-danger">Access denied. Please <a href="login.php">login</a>.</div>
    </div>
<?php
endif;

include "includes/footer.php"; ?>
