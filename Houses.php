<?php
// Retrieve the value of the cookie

include 'db/mysql.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.js"></script>
    <?php include 'components/cdn.php'; ?>
</head>

<body>
    <?php include 'components/nav.php'; ?>
    <div class="container p-4" style="margin-top: 10px;">
        <div class="row">
            <br />
            <h2 align="center">House Listings:</h2>
            <br />
            <div class="col-md-3">
                <div class="list-group mb-4">
                    <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="6500000" />
                    <p id="price_show">1 lakh - 100 lakhs</p>
                    <div id="price_range"></div>
                </div>
                <div class="list-group">
                    <h3>States</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        <?php

                        $query = "SELECT DISTINCT(state) FROM listing ORDER BY state DESC";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result = $statement->get_result();
                        foreach ($result as $row) {
                        ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector state" value="<?php echo $row['state']; ?>"> <?php echo $row['state']; ?></label>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>


            </div>

            <div class="col-md-9">
                <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    <style>
        #loading {
            text-align: center;
            background: url('loader.gif') no-repeat center;
            height: 150px;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            filter_data();

            function filter_data() {
                var filterData = document.querySelector('.filter_data');
                filterData.innerHTML = '<div id="loading" style=""></div>';

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        filterData.innerHTML = xhr.responseText;
                    }
                };

                xhr.open("POST", "components/fetch_houses.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                var minimum_price = document.querySelector('#hidden_minimum_price').value;
                var maximum_price = document.querySelector('#hidden_maximum_price').value;
                var state = get_filter('state');
                const params = new Proxy(new URLSearchParams(window.location.search), {
                    get: (searchParams, prop) => searchParams.get(prop),
                });
                // Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
                let type =params.type; // "some_value"
                console.log(type)
                var data = {
                    action: 'fetch_data',
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    state: state,
                    type: type,
                };
                console.log(JSON.stringify(data))
                xhr.send(JSON.stringify(data));

            }

            function get_filter(class_name) {
                var filter = [];
                var inputs = document.querySelectorAll('.' + class_name + ':checked');

                inputs.forEach(function(input) {
                    filter.push(input.value);
                });

                return filter;
            }

            var checkboxes = document.querySelectorAll('.common_selector');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('click', function() {
                    filter_data();
                });
            });

            var priceRange = document.querySelector('#price_range');
            noUiSlider.create(priceRange, {
                start: [0, 6500000],
                connect: true,
                step: 500,
                range: {
                    'min': 0,
                    'max': 6500000,
                }
            });

            var priceShow = document.querySelector('#price_show');
            var hiddenMinimumPrice = document.querySelector('#hidden_minimum_price');
            var hiddenMaximumPrice = document.querySelector('#hidden_maximum_price');

            priceRange.noUiSlider.on('update', function(values, handle) {
                priceShow.innerHTML = `${(values[0]/100000)} lakhs - ${(values[1]/100000)} lakhs`
                hiddenMinimumPrice.value = values[0];
                hiddenMaximumPrice.value = values[1];
            });

            priceRange.noUiSlider.on('end', function() {
                filter_data();
            });
        });
    </script>


</body>

</html>