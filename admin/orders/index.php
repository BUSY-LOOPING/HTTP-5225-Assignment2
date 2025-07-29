<?php
include "../includes/connect.php";
include "../auth/session.php";
include('functions.php');
$orders = get_orders($connect);
while ($row = mysqli_fetch_assoc($orders)) {
    echo "Order #" . $row['id'] . " - " . $row['customer'] . " - " . $row['order_date'] . " - $" . $row['total'];
    echo " <a href='view.php?id=" . $row['id'] . "'>View</a><br>";
}
echo "<a href='../index.php'>Back to Dashboard</a>";
