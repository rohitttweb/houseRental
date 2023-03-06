<?php
 // Retrieve the value of the cookie
 if (isset($_COOKIE["username"])) {
    echo "Aleredy Loged in ";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'components/cdn.php'; ?>
</head>

<body>
    <div class="container  pt-4" style="max-width: 400px;">
        
    <h3 class="display-3 text-primary mb-4 fw-bold">Login</h3>
    <form action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">

                <?php
                include 'db/mysql.php';


               
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username =  $_POST["username"];
                    $password =  $_POST["password"];
                    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` ='$password'";

                    $result = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Username: " . $row["username"] . "<br>";
                        }
                        setcookie("username", $username, time() + (86400 * 30), "/");
                        header("Location: index.php");
                        exit;
                    } else {
                        echo "username or password not matched results";
                    }
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>