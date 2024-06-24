 <?php 
include 'connection2.php'; 
$query = "SELECT * FROM signup";
$data = mysqli_query($conn, $query);

if ($data === false) {
    die("Query failed: " . mysqli_error($conn));
}

$total = mysqli_num_rows($data);

if ($total > 0) {
   // echo "TABLE HAS RECORDS<br>";
?>
<h2> Records</h2>
    <table border="1" cellspacing="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "<tr>
                    <td>" . htmlspecialchars($result['id']) . "</td>
                    <td>" . htmlspecialchars($result['name']) . "</td>
                    <td>" . htmlspecialchars($result['email']) . "</td>
                    <td>" . htmlspecialchars($result['password']) . "</td>
                    <td><a href='signup_update.php?id={$result['id']}'>Update</a></td>
                    <td><a href='#' onclick='deleteBooking({$result['id']});'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
<?php
} else {
    echo "No records found";
}


mysqli_close($conn);
?>
<script>
function deleteBooking(id) {
    if (confirm('Are you sure you want to delete this?')) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'delete_signup.php?id=' + id, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                location.reload();
            } else {
                alert('Error deleting record: ' + xhr.responseText);
            }
        };
        xhr.send();
    }
}
</script>
