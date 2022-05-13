
    <?php include('menu.php'); ?>
    <section class="food-search">
        <div class="container">
            <?php 
                $search = $_POST['search'];
            ?>

            <h2><a href="#" class="search">Foods on Your Search "<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <section class="food-menu">
        <div class="container">
            <h2 class="my-food">Food Menu</h2>
            <?php 

                //SQL Query to Get foods based on search keyword
                $sql = "SELECT * FROM food WHERE title LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                //Count Rows to check if there is rows
                $count = mysqli_num_rows($res);

                //Check whether food available of not
                if($count>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-box">
                            <div class="food-box-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="images/food/<?php echo $image_name; ?>" alt="" class="img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-show">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail"><?php echo $description; ?></p>
                                <br>

                                <a href="order.php?food_id=<?php echo $id; ?>" class="ordering">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Food not found.</div>";
                }
            
            ?>
            <div class="toAdd"></div>
        </div>
    </section>
    <?php include('footer.php'); ?>