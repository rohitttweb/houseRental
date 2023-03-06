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
    <div class="container-sm p-4" style="max-width: 400px;">
    <h3 class="display-3 text-primary mb-4 fw-bold">Sign Up</h3>

        <form action="signup.php" method="post">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="username" class="form-control" id="username">
                <div id="username_msg"></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="re-password" class="form-label">Re-Password</label>
                <input name="re-password" type="password" class="form-control" id="re-password">
            </div>
            <div class="mb-3 " id="error">

                <?php
                include 'db/mysql.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name =  $_POST["name"];
                    $username =  $_POST["username"];
                    $password =  $_POST["password"];
                    $re_password =  $_POST["re-password"];

                    if ($password == $re_password) {
                        $sql = "SELECT * FROM `users` WHERE `username` = '$username'";

                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "user exit";
                        } else {
                            $sql_adduser = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
                            if (mysqli_query($connect, $sql_adduser)) {
                                echo "New user added successfully";
                                header("Location: index.php");
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                            }
                        }
                    } else {
                        echo "password not matched";
                    }
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <script>
        const usernameInput = document.getElementById('username');
        const messageDiv = document.getElementById('username_msg');

        usernameInput.addEventListener('input', () => {
            const username = usernameInput.value;

            // Make an AJAX request to the server to check if the entered username exists
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    messageDiv.innerHTML = this.responseText;
                }
            };
            xhr.open('POST', 'components/check_username.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('username=' + username);
        });

        const input = document.querySelectorAll('input');
        const div = document.getElementById('error');
        input.forEach(item => {
            item.addEventListener('change', () => {
                div.innerHTML = '';
            });
        });
    </script>
</body>

</html>