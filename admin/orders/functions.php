<?php
function get_orders($connect)
{
    $q = "SELECT orders.id, orders.order_date, orders.total, customers.name as customer
    FROM orders
    JOIN customers ON orders.customer_id=customers.id
    ORDER BY orders.order_date DESC";
    $result = mysqli_query($connect, $q);
    return $result;
}

function get_order_by_id($connect, $id)
{
    $q = "SELECT orders.id, orders.order_date, orders.total, customers.name as customer
    FROM orders
    JOIN customers ON orders.customer_id=customers.id
    WHERE orders.id=$id";
    $result = mysqli_query($connect, $q);
    return mysqli_fetch_assoc($result);
}

function create_order($connect, $customer_id, $total)
{
    $q = "INSERT INTO orders (customer_id, total) VALUES ($customer_id, $total)";
    mysqli_query($connect, $q);
}

function delete_order($connect, $id)
{
    $q = "DELETE FROM orders WHERE id=$id";
    mysqli_query($connect, $q);
}

function get_order_items($connect, $order_id)
{
    $q = "SELECT products.name, order_items.quantity, order_items.price
    FROM order_items
    JOIN products ON order_items.product_id=products.id
    WHERE order_items.order_id=$order_id";
    $result = mysqli_query($connect, $q);
    return $result;
}
?>