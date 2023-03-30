
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Body Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;

            padding: 0;


        }

        /* Main Styles */
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section1 {
            text-align: center;
            margin: 50px;
        }

        .section1 h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .section1 p {
            font-size: 20px;
            line-height: 1.5;
            margin-bottom: 50px;
        }

        .section2 {
            display: flex;
            justify-content: center;
        }

        .houseFor {
            display: flex;
            justify-content: center;
        }

        .rent,
        .sale {
            margin: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            width: 300px;
        }

        .card img {
            border-radius: 50%;
            height: 150px;
            margin-bottom: 20px;
            width: 150px;
        }

        .card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            display: inline-block;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0062cc;
        }

        @media only screen and (max-width: 768px) {
            .houseFor {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
       <?php include 'components/nav.php'; ?>

    <main>
       
        <section class="section1">
            <h1>Welcome to House Market Place</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas assumenda quos repellendus vel libero corporis voluptas fuga amet magni enim? Aspernatur assumenda animi error quibusdam, enim odio accusamus doloremque consectetur.</p>
        </section>
        <section class="section2">
            <div class="houseFor">
                <div class="rent">
                    <div class="card">
                        <img src="images/rent.jpg" alt="Placeholder image">
                        <h3>House for rent</h3>
                        <p>This is a simple card with some text content.</p>
                        <a href="Houses.php?type=rent" class="btn">Learn More</a>
                    </div>

                </div>
                <div class="sale">
                    <div class="card">
                        <img src="images/sale.jpg" alt="Placeholder image">
                        <h3>House for Sale</h3>
                        <p>This is a simple card with some text content.</p>
                        <a href="Houses.php?type=sale" class="btn">Learn More</a>
                    </div>

                </div>
            </div>
        </section>
    </main>

</body>

</html>