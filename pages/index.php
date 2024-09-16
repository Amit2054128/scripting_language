<?php
$title = 'hello';
include '../connection/db.php';
ob_start();
?>
<h1>Main Page</h1>
<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" >
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    
    <button type="submit" name="submit">Submit</button>
</form>

<?php
 
    if (isset($_POST['submit'])) {
        // Collect form data
        $name = $_POST['name'];
        $email = $_POST['email'];
    
        // Prepare SQL Insert query
        if(!empty($name) && !empty($email)){
            $query = "INSERT INTO users (name, email) VALUES ('{$name}', '{$email}')";
            mysqli_query($con,$query);
            echo "<script>alert('success')</script>";
        }else{
            echo "<script>alert('Please insert data')</script>";
        }
        // Close the database connection
        $con->close();
    }
?>
<?php
$content = ob_get_clean();
include '../layout/layout.php'
?>