<?php
include('../connect.php');
include('../auth/session.php');
include('functions.php');
$id = intval($_GET['id']);

if ($_POST) {
    $name = $_POST['name'];
    $contact_email = $_POST['contact_email'];
    update_supplier($connect, $id, $name, $contact_email);
    header("Location: index.php");
    exit;
}

$supplier = get_supplier_by_id($connect, $id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Supplier</h2>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" id="name" class="form-control" value="<?php echo $supplier['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" class="form-control" value="<?php echo $supplier['contact_email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Supplier</button>
        </form>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
</body>

</html>