<?php
include('../includes/connect.php');
include('../auth/session.php');
include('functions.php');

$id = intval($_GET['id']);
$category = get_category_by_id($connect, $id);

if ($_POST) {
    $name = $_POST['name'];
    update_category($connect, $id, $name);
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Category</h2>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" id="name" class="form-control" value="<?php echo $category['name']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
</body>

</html>