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

    <?php include 'components/nav.php'; ?>
    <div class="container pt-4" style="max-width: 600px; margin-top: 100px">
        <h3 class="display-4 text-primary mb-4 fw-bold">Add Listing for Your flat</h3>


        <form action="addListing.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
                    <option selected disabled>Select Type</option>
                    <option value="sale">For Sale</option>
                    <option value="rent">For Rent</option>
                    <!-- add more options here -->
                </select>
            </div>
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
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <div class="mb-3">
                <label for="bedrooms" class="form-label">Bedrooms</label>
                <input type="number" class="form-control" id="bedrooms" name="bedrooms">
            </div>
            <div class="mb-3">
                <label for="bathrooms" class="form-label">Bathrooms</label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact">
            </div>
            <div class="mb-3">
                <label for="parking" class="form-label p-3">Parking</label>
                <input id="parking" type="radio" name="parking">
                <label for="furnished" class="form-label p-3">furnished</label>
                <input id="furnished" type="radio" name="furnished">
            </div>
            <div class="mb-3">
                Select image to upload:
                <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
            </div>
            <?php
            include 'db/mysql.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $type = $_POST['type'];
                $state = $_POST['state'];
                $address = $_POST['address'];
                $bedrooms = $_POST['bedrooms'];
                $bathrooms = $_POST['bathrooms'];
                $price = $_POST['price'];
                $contact = $_POST['contact'];

                // Do something with the form values, such as insert them into a database


                $sql = "INSERT INTO listing (state, price, contact,address) VALUES ('$state', '$price','$contact', '$address')";



                if (mysqli_query($connect, $sql)) {
                    $new_id = mysqli_insert_id($connect);
                    $target_dir = "uploads/";
                    $uploadOk = 1;

                    // Loop through all uploaded files
                    foreach ($_FILES["fileToUpload"]["tmp_name"] as $index => $tmp_name) {

                        // Get the original file name and extension
                        $file_name = $_FILES["fileToUpload"]["name"][$index];
                        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

                        // Set the target file name to include the ID and file extension
                        $target_file = $target_dir . $new_id . '_' . ($index + 1) . '.' . $file_ext;

                        // Check if file already exists
                        if (file_exists($target_file)) {
                            echo "Sorry, file " . $file_name . " already exists.";
                            $uploadOk = 0;
                        }

                        // Check file size (5MB maximum)
                        if ($_FILES["fileToUpload"]["size"][$index] > 5 * 1048576) {
                            echo "Sorry, file " . $file_name . " is too large. Maximum file size is 5MB.";
                            $uploadOk = 0;
                        }

                        // Allow certain file formats (JPG, JPEG, PNG, GIF)
                        $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
                        if (!in_array($file_ext, $allowed_exts)) {
                            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        } else {
                            if (move_uploaded_file($tmp_name, $target_file)) {
                                echo "The file " . $file_name . " has been uploaded.";
                            } else {
                                echo "Sorry, there was an error uploading file " . $file_name . ".";
                            }
                        }
                    }

                    echo "New Listing added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                }
            }
            ?>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>

</html>