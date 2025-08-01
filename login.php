
<?php
include("connect.php");
include("functions.php");
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $email;
    echo $password;

    $user = authenticate($connect, $email, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid login credentials.";
    }
}

?>

<?php
include("header.php");
?>




<div class="container mt-5" style="max-width: 500px;">
  <h2 class="mb-3">User Login</h2>
  <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
  <form method="post">
    <div class="mb-3">
      <label>Email</label>
      <input name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary">Login</button>
  </form>
</div>

<?php include("footer.php"); ?>