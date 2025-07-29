<?php
function get_categories($connect)
{
    $q = "SELECT * FROM categories ORDER BY name";
    $result = mysqli_query($connect, $q);
    return $result;
}


function create_category($connect, $name)
{
    $q = "INSERT INTO categories (name) VALUES ('$name')";
    mysqli_query($connect, $q);
}

function delete_category($connect, $id)
{
    $q = "DELETE FROM categories WHERE id=$id";
    mysqli_query($connect, $q);
}

function update_category($connect, $id, $name)
{
    $q = "UPDATE categories SET name='$name' WHERE id=$id";
    mysqli_query($connect, $q);
}

function get_category_by_id($connect, $id)
{
    $q = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connect, $q);
    return mysqli_fetch_assoc($result);
}



?>