<?php
include('../connect.php');
include('../auth/session.php');
include('functions.php');
if ($_POST) {
    $name = $_POST['name'];
    $contact_email = $_POST['contact_email'];
    create_supplier($connect, $name, $contact_email);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Add Supplier</h2>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Supplier</button>
        </form>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
</body>

</html>