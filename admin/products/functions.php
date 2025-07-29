<?php
function get_products($connect)
{
    $q = "SELECT products.id, products.name, products.price, products.image, products.stock, categories.name as category, suppliers.name as supplier
    FROM products
    LEFT JOIN categories ON products.category_id=categories.id
    LEFT JOIN suppliers ON products.supplier_id=suppliers.id
    ORDER BY products.name";
    $result = mysqli_query($connect, $q);
    return $result;
}

function get_product_by_id($connect, $id)
{
    $q = "SELECT products.id, products.name, products.price, products.image, products.stock, categories.name as category, suppliers.name as supplier
    FROM products
    LEFT JOIN categories ON products.category_id=categories.id
    LEFT JOIN suppliers ON products.supplier_id=suppliers.id
    WHERE products.id = {$id}
    ORDER BY products.name";
    $result = mysqli_query($connect, $q);
    return mysqli_fetch_assoc($result);
}

function search_products($connect, $search = '', $category_id = null, $supplier_id = null)
{
    $q = "SELECT products.id, products.name, products.price, products.image, products.stock, categories.name as category, suppliers.name as supplier
    FROM products
    LEFT JOIN categories ON products.category_id=categories.id
    LEFT JOIN suppliers ON products.supplier_id=suppliers.id
    WHERE 1=1";

    if ($search) {
        $q .= " AND products.name LIKE '%{$search}%'";
    }

    if ($category_id) {
        $q .= " AND products.category_id = {$category_id}";
    }

    if ($supplier_id) {
        $q .= " AND products.supplier_id = {$supplier_id}";
    }

    $q .= " ORDER BY products.name";

    $result = mysqli_query($connect, $q);
    return $result;
}

function create_product($connect, $name, $description, $price, $category_id, $supplier_id, $stock)
{
    $q = "INSERT INTO products (name, description, price, category_id, supplier_id, stock)
    VALUES ('$name', '$description', $price, $category_id, $supplier_id, $stock)";
    mysqli_query($connect, $q);
}

function delete_product($connect, $id)
{
    $q = "DELETE FROM products WHERE id=$id";
    mysqli_query($connect, $q);
}

function update_product($connect, $id, $name, $description, $price, $category_id, $supplier_id, $stock)
{
    $q = "UPDATE products SET name='$name', description='$description', price=$price, category_id=$category_id, supplier_id=$supplier_id, stock=$stock WHERE id=$id";
    mysqli_query($connect, $q);
}
