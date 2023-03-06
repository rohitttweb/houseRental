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

    <?php
    // Get house id from URL parameter
    include 'db/mysql.php';

    $id = $_GET['id'];

    // Connect to database

    // Query to get house details
    $query = "SELECT * FROM listing WHERE id = $id";

    // Execute query
    $result = mysqli_query($connect, $query);

    // Check if query was successful
    if (!$result) {
        die('Error: ' . mysqli_error($connect));
    }

    // Fetch house details as an associative array
    $house = mysqli_fetch_assoc($result);

    // Close database connection
    mysqli_close($connect);
    ?>

    <!-- HTML code for displaying house information -->
    <div class="container mt-4 p-4">
        <div class="row">
            
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">House Information</h5>
                        <p class="card-text"><b>ID:</b> <?php echo $house['id']; ?></p>
                        <p class="card-text"><b>State:</b> <?php echo $house['state']; ?></p>
                        <p class="card-text"><b>Size:</b> <?php echo $house['size']; ?></p>
                        <p class="card-text"><b>Price:</b> <?php echo (($house['price']) / 100000) . ' lakhs'; ?></p>
                        <p class="card-text"><b>Address:</b> <?php echo $house['address']; ?></p>
                        <p class="card-text"><b>Contact:</b> <?php
                        if(!$_COOKIE['username']){
                            echo '<button>Login To See Contact details</button>';
                        }else{
                            echo $house['contact']; 
                        }
                            ?>
                    </p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="img.png" class="card-img-top" alt="House image">
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            padding: 20px;
        }

        .card-img-top {
            width: 100%;
            height: auto;
        }
    </style>


</body>

</html>