<?php
include "includes/header.php";

if(isset($_SESSION['authUser']) and $_SESSION['authUser']):

    /**
     *@var $db mysqli
     */

    require_once "includes/database.php";
?>
   <?php if ($_SESSION['authUser']['role'] == '2'): ?>
    <?php
    $query = "SELECT authUsers.id, email, role, users.name AS roleType
FROM `authUsers`
JOIN users ON authUsers.role = users.Userid
ORDER BY role";


    $result = @mysqli_query($db, $query) or die("error in query.");
    ?>
<h1>Edit User Role:</h1>
    <table class="table table-striped table-bordered table-rows" id="product_table">
    <thead>
    <tr>
        <th>User</th>
        <th>User Type</th>
    </tr>
    </thead>
    <tbody>

    <?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['roleType'] . '</td>';
        echo "<td><a href='edit-admin.php?id={$row['id']}' class='btn btn-secondary'>Edit</a>
      </td>";
        echo '</tr>';
    }
    ?>

    </tbody>
    </table>









<?php else: ?>
    <div class="container">
        <h1>Admin Area</h1>
        <div class="alert alert-danger">Access denied. Admin area only!</div>
    </div>

    <?php
//close the database connection (put in footer)
mysqli_close($db);
endif;
?>
<?php else: ?>
    <div class="container">
        <h1>Admin Area</h1>
        <div class="alert alert-danger">Access denied. Please <a href="login.php">login</a>.</div>
    </div>
<?php
endif;

include "includes/footer.php"; ?>