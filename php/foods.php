
    <?php include('menu.php'); ?>
    <section class="food-search">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="ordering">
            </form>

        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <h2 class="my-food">Food Menu</h2>

            <?php 
            
                $sql = "SELECT * FROM food";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="food-box">
                            <div class="food-box-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-show">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
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