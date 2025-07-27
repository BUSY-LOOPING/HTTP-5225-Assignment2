<?php
include "connect.php"; include "session.php";
$q = mysqli_query($connect, "
    SELECT orders.id, orders.order_date, orders.total, customers.name as customer
    FROM orders
    JOIN customers ON orders.customer_id=customers.id
    ORDER BY orders.order_date DESC
");
while ($row = mysqli_fetch_assoc($q)) {
    echo "Order #".$row['id']." - ".$row['customer']." - ".$row['order_date']." - $".$row['total'];
    echo " <a href='order_view.php?id=".$row['id']."'>View</a><br>";
}
echo "<a href='products.php'>Back to Products</a>";
?>
