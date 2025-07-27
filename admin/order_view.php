<?php
include "connect.php"; include "session.php";
$order_id = intval($_GET['id']);
$q = mysqli_query($connect, "
    SELECT orders.id, orders.order_date, orders.total, customers.name as customer
    FROM orders
    JOIN customers ON orders.customer_id=customers.id
    WHERE orders.id=$order_id
");
$order = mysqli_fetch_assoc($q);

echo "Order #".$order['id']."<br>Customer: ".$order['customer']."<br>Date: ".$order['order_date']."<br>Total: $".$order['total']."<br><br>";

$q2 = mysqli_query($connect, "
    SELECT products.name, order_items.quantity, order_items.price
    FROM order_items
    JOIN products ON order_items.product_id=products.id
    WHERE order_items.order_id=$order_id
");
while ($item = mysqli_fetch_assoc($q2)) {
    echo $item['name']." x ".$item['quantity']." - $".$item['price']."<br>";
}
echo "<a href='orders.php'>Back</a>";
?>
