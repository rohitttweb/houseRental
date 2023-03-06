<?php

//fetch_data.php

include('../db/mysql.php');

// Get the JSON data from the AJAX request
$json_data = file_get_contents('php://input');

// Decode the JSON data to a PHP associative array
$data = json_decode($json_data, true);

// Extract the values from the array
$action = $data['action'];
$minimum_price = $data['minimum_price'];
$maximum_price = $data['maximum_price'];
$state = $data['state'];
$Size = $data['size'];

// Use the extracted values in your PHP code as needed
// For example, you can use them in your SQL query to filter data
if ($action === 'fetch_data') {
    $query = "
		SELECT id,state, size, price,address, contact FROM listing WHERE sold = '0'
	";
    if(!empty($minimum_price) && !empty($maximum_price))
    {
        $query .= "
             AND price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
        ";
    }
    if(!empty($state))
    {
        $state_filter = implode("','",$state);
        $query .= "
             AND state IN('".$state_filter."')
        ";
    }
    if(!empty($Size))
    {
        $Size_filter = implode("','", $Size);
        $query .= "
             AND size IN('".$Size_filter."')
        ";
    }

    // Execute the query and return the results as needed
    $result = mysqli_query($connect, $query);
    $total_row = mysqli_num_rows($result);
    $output = '';
    if($total_row > 0)
    {
        foreach($result as $row)
        {
            $output .= '
            <div class="col-sm-6 col-lg-4 col-md-6">
                
                <div class="card mt-3">
                <img src="img.png"></img>
                <div class="card-body">
                    <p class="card-text"><b>State:</b> '.$row['state'].'</p>
                    <p class="card-text"><b>Size:</b> '.$row['size'].'</p>
                    <p class="card-text"><b>Price:</b> '.(($row['price'])/100000).' lakhs</p>
                    <a href="house.php?id='.$row['id'].'" class="btn btn-primary">Visit House</a>
                </div>
                </div>
            </div>
            ';
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}

if(isset($_POST["action"]))
{
    $query = "
        SELECT * FROM product WHERE product_status = '1'
    ";
    echo $_POST['brand'];
}

?>
