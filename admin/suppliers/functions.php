<?php
function get_suppliers($connect)
{
    $q = "SELECT * FROM suppliers ORDER BY name";
    $result = mysqli_query($connect, $q);
    return $result;
}

function get_supplier_by_id($connect, $id)
{
    $q = "SELECT * FROM suppliers WHERE id=$id";
    $result = mysqli_query($connect, $q);
    return mysqli_fetch_assoc($result);
}

function update_supplier($connect, $id, $name, $contact_email)
{
    $q = "UPDATE suppliers SET name='$name', contact_email='$contact_email' WHERE id=$id";
    mysqli_query($connect, $q);
}

// function delete_supplier($connect, $id)

function create_supplier($connect, $name, $contact_email)
{
    $q = "INSERT INTO suppliers (name, contact_email) VALUES ('$name', '$contact_email')";
    mysqli_query($connect, $q);
}

function delete_supplier($connect, $id)
{
    $q = "DELETE FROM suppliers WHERE id=$id";
    mysqli_query($connect, $q);
}
?>