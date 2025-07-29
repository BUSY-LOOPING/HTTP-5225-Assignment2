<?php
include "../includes/connect.php";
include "../auth/session.php";
include('functions.php');
$order_id = intval($_GET['id']);
$order = get_order_by_id($connect, $order_id);

echo "Order #" . $order['id'] . "<br>Customer: " . $order['customer'] . "<br>Date: " . $order['order_date'] . "<br>Total: $" . $order['total'] . "<br><br>";

$order_items = get_order_items($connect, $order_id);
while ($item = mysqli_fetch_assoc($order_items)) {
    echo $item['name'] . " x " . $item['quantity'] . " - $" . $item['price'] . "<br>";
}
echo "<a href='index.php'>Back</a>";
