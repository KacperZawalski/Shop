<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'HGJ_5NSzV]tq[/7q';
    $dbname = 'shopdatabase';
    $productsImagesPath = 'productsImages/';
    $connection = new mysqli($servername, $username, $password, $dbname);
    
    if ($connection->connect_error)
    {
        die("Connection failed: " . $conn->connect_errot);
    }

    $query = "SELECT * FROM products";
    $result = $connection->query($query);

    if ($result->num_rows > 0)
    {
        $i = 0;
        while ($row = $result->fetch_assoc())
        {
            if ( !($row["price"] % 100) )
            {
                $price = $row["price"] / 100 . ".00";
            }
            else
            {
                $price = $row["price"] / 100;
            }
            ?>
                <div class="product" id="<?php echo $i; ?>">
                    <div class="productImage">
                        <img src="<?php echo $productsImagesPath . $row["imgsrc"];?>"></img>
                    </div>
                    <div class="productName">
                        <?php echo $row["name"];?>
                    </div>
                    <div class="productPrice">
                        <?php echo $price; ?>
                    </div>
                    <div class="productAddToCart">
                        <button onclick="cart.addToCart(<?php echo $i.','.$row['id']; ?>, 1)" class="addToCart">Add to cart </button>
                    </div>
                </div>
            <?php
            $i++;
        }
    }

?>