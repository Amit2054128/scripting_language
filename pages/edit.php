<?php
include '../connection/db.php';


if (isset($_POST['update'])) {
 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];


    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
        // header("Location: list.php"); 
    } else {
        echo "Error updating record: " . $con->error;
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT id, name, email FROM users WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    } else {
        echo "No user found with this ID.";
    }
} else {
    echo "Invalid request.";
    exit;
}
?>



<h2>Edit User</h2>

<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Hidden field for ID -->
    <div>
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value="<?php echo $name; ?>" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
    </div>
    <button class="btn btn-primary my-2" type="submit" name="update">Update</button>
</form>

<?php
$content = ob_get_clean();
include '../layout/layout.php';
?>
