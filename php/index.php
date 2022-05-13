    <?php include('menu.php'); ?>

    <section class="food-search">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Foods" required>
                <input type="submit" name="submit" value="Search" class="srch">
            </form>

        </div>
    </section>
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
    <section class="categories">
        <div class="container">
            <h2 class="my-food">Explore Various Food Categories</h2>

            <?php 
                $sql = "SELECT * FROM category";
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="images/category/<?php echo $image_name; ?>" alt="" class="img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text1" ><mark style="background-color:white;"><?php echo $title; ?></mark></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="toAdd"></div>
        </div>
    </section>


    <section class="food-menu">
        <div class="container">
            <h2 class="my-food">Our Food Menu</h2>

            <?php 
            
            //Getting Foods from Database
            //SQL Query
            $sql2 = "SELECT * FROM food";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-box">
                        <div class="food-box-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
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
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }
            
            ?>
            <div class="toAdd"></div>
        </div>

        <p class="my-food">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <?php include('footer.php');?>