<?php 
include 'connection2.php'; 
$query = "SELECT * FROM booking";
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
            <th>Number</th>
            <th>Place of Stay</th>
            <th>Reservation Date</th>
            <th>Room(s)</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "<tr>
                    <td>" . htmlspecialchars($result['id']) . "</td>
                    <td>" . htmlspecialchars($result['name']) . "</td>
                    <td>" . htmlspecialchars($result['email']) . "</td>
                    <td>" . htmlspecialchars($result['number']) . "</td>
                    <td>" . htmlspecialchars($result['location']) . "</td>
                    <td>" . htmlspecialchars($result['reser_date']) . "</td>
                    <td>" . htmlspecialchars($result['room']) . "</td>
                    <td><a href='update_booking.php?id={$result['id']}'>Update</a></td>
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
    if (confirm('Are you sure you want to delete this booking?')) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'delete_booking.php?id=' + id, true);
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
