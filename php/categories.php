
<?php include('menu.php'); ?>

    <section class="categories">
        <div class="container">
            <h2 class="my-food">Explore Foods</h2>

            <?php 

                //Display all the cateories that are active
                //Sql Query
                $sql = "SELECT * FROM category";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether categories available or not
                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text1"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //CAtegories Not Available
                    echo "<div class='error'>Category not found.</div>";
                }
            
            ?>
            

            <div class="toAdd"></div>
        </div>
    </section>
    <?php include('footer.php'); ?>