<?php
$title = 'hello';
include '../connection/db.php';
ob_start();
$sql = "SELECT id, name, email,address FROM users";
$result = $con->query($sql);
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if ($result->num_rows > 0) {
  
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th scope='row'>" . $row['id'] . "</th>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>";
            echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> "; // Edit button
            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>"; // Delete button
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data found</td></tr>";
    }
    ?>
  </tbody>
</table>

<?php
$content = ob_get_clean();
include '../layout/layout.php';
?>