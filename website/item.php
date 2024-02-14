<?php 
include("partials-frontend/nav.php");
?>
<section class="item" id="item">
  <h1 class="text-danger text-center">Our Item</h1>
  <div class="container">
  <div class="line" style="width: 100%; height: 2px; background-color: #e53937;"></div>
  </div>
  <div class="row" style="margin-top: 30px;">
    <?php 
    //Display items that are Active
    $sql = "SELECT * FROM tbl_item WHERE active='Yes'";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    //Check whether the items are available or not
    if ($res && mysqli_num_rows($res) > 0) {
        //Items Available
        while ($row = mysqli_fetch_assoc($res)) {
            //Get the Values
            $id = $row['id'];
            $title = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
            $image_name = $row['image_name'];
    ?>
            <div class="col-md-3 py-3 py-md-0 mt-3">
              <div class="card">
                <?php 
                //Check whether image available or not
                if ($image_name == "") {
                    //Image not Available
                    echo "<div class='error'>Image not Available.</div>";
                } else {
                    //Image Available
                ?>
                    <img src="<?php echo SITEURL; ?>images/item/<?php echo $image_name; ?>" alt="handscraft artistry" style="height:240px";>
                <?php
                }
                ?>
                <div class="card-body text-center">
                  <h3><?php echo $title;?></h3>
                  <h6><?php echo $description;?></h6>
                  <p class="text-danger"> Rs <?php echo $price;?></p>
                 
                    <a href="<?php echo SITEURL; ?>order.php?item_id=<?php echo $id; ?>" class="btn btn-primary">Add to cart</a>
                    <a href="<?php echo SITEURL; ?>viewitem.php?item_id=<?php echo $id; ?>" class="btn btn-primary">Quick view</a>
                </div>
              </div>
            </div>
    <?php
        }
    } else {
        //Item not Available
        echo "<div class='col-md-12'><div class='error'>Item not found.</div></div>";
    }
    ?>
  </div>
  <div class="clearfix"></div>
</section>
<?php include("partials-frontend/footer.php"); ?>
