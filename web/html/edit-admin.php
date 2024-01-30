<?php
    /**
     *@var $db mysqli
     */

    require_once "includes/database.php";
?>
<?php
    if(isset($_POST['update'])) {


    //get field values
        $Userid = $_POST['user_id'] ?? '';
    $id = $_POST['id'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';
        $name = $_POST['name'] ?? '';


    //build the query
    $query = "UPDATE `authUsers`
    SET `id` = ?,
    `email` = ?,
    `password` = ?,
    `role` = ?
    WHERE `authUsers`.`id` = ?;";

        $stmt = @mysqli_prepare($db, $query) or die('Error Loading Query');
        mysqli_stmt_bind_param($stmt, 'issii', $id, $email, $password, $role, $id);
        $result = @mysqli_stmt_execute($stmt) or die('error updating');

//    $result = @mysqli_query($db, $query) or die("error in query.");

    header('Location: admin.php?id=' . $id);
    }

$adminid = $_GET['id'] ?? '';
$safe_code = mysqli_real_escape_string($db, $adminid);

$query = "SELECT * FROM authUsers WHERE id = '$safe_code'";
$result = @mysqli_query($db, $query) or die("Error loading toys.");
$roles = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<?php
include "includes/header.php";
?>
    <h1>Edit User</h1>

    <form method="post">
        <div class="mb-3">
            <label for="id" class="form-label"></label>
            <input type="hidden" name="id" value="<?= $roles['id'] ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">User</label>
            <input type="text" readonly class="form-control" id="email" name="email" value="<?= $roles['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"></label>
            <input type="hidden" class="form-control" id="password" name="password" value="<?= $roles['password'] ?>">
        </div>
        <div class="mb-3">
            <?php
            $query = "SELECT Userid, name FROM users ORDER BY name";
            $result = @mysqli_query($db, $query) or die('Error in query');
            ?>
            <label for="role" class="form-label">User Type</label>
            <select name="role" id="role" class="form-select">
                <?php
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $selected = $row['Userid'] == $roles['role'] ? ' selected ' : '';
                    echo "<option value='{$row['Userid']}' $selected>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>

        <input type="hidden" name="id" value="<?= $roles['id'] ?>">
        <button type="submit" name="update" class="btn btn-primary">Update User</button>
    </form>










    <?php
//close the database connection (put in footer)
mysqli_close($db);
?>

<?php

include "includes/footer.php"; ?>