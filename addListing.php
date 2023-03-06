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
    <div class="container pt-4" style="max-width: 600px;">
        <h3 class="display-3 text-primary mb-4 fw-bold">Add Listing for Your flat</h3>


        <form action="addListing.php" method="post">
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <select class="form-select" id="state" name="state">
                    <option selected disabled>Select a state</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Jammu">Jammu</option>
                    <option value="Himachal Pardesh">Himachal Pardesh</option>
                    <!-- add more options here -->
                </select>
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <select class="form-select" id="size" name="size">
                    <option selected disabled>Select a size</option>
                    <option value="1BHK">1BHK</option>
                    <option value="2BHK">2BHK</option>
                    <option value="3BHK">3BHK</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact">
            </div>
            <?php
            include 'db/mysql.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $state = $_POST['state'];
                $size = $_POST['size'];
                $price = $_POST['price'];
                $address = $_POST['address'];
                $contact = $_POST['contact'];

                // Do something with the form values, such as insert them into a database


                $sql = "INSERT INTO listing (state, size, price, contact,address) VALUES ('$state', '$size', '$price','$contact', '$address')";


               
                if (mysqli_query($connect, $sql)) {
                    echo "New Listing added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                }
            }
            ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>

</html>