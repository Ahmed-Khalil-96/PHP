<?php 
session_start();
if(!isset($_SESSION["username"])) {

    header("Location: Signup.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    unset($_COOKIE['PHPSESSID']); 
    setcookie('PHPSESSID', '', -1, '/');
    session_destroy();
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; 
        }

        .welcome-container {
            max-width: 800px; 
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            margin-top: 50px; 
        }

        h1 {
            color: #007bff; 
        }

        .logout-btn {
            margin-top: 10px; 
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h1>Welcome - <?php echo $_SESSION["username"] ?></h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="logout-btn">
            <button class="btn btn-danger" name="logout">Logout</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofP+WiNGaFqDA8xsjE+IbbVNH3A6b6L" crossorigin="anonymous"></script>
</body>
</html>
