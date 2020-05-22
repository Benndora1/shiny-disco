<?php

/**
 *
 * @param $data
 */
function generate_slider($data){
    $data = mongo_to_array($data);
    $data = protect_output($data); // XSS protection
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">e-GAMING STORE</h1>
    </div>

</div>
<?php
}

/**
 * Generate HTML for featured products
 */
function generate_feature(){
?>
    <div class="container">
        <div class="row page-intro">
            <div class="col-lg-12">
                <h1>Featured Products</h1>
            </div>
        </div>

    <div class="row">
        <?php

        //connect to database
        $products = (new MongoDB\Client)->ecomerce->products->find();
        // .limit(6) not working

        foreach ($products as $cust) { ?>
            <div class="col-md-4">
                <article class="article-intro">
                    <a href="product_details.html">
                        <img class="img-responsive img-rounded" src="'../images/product-images/<?php echo $cust['name'] ?>" alt="">
                    </a>
                    <h3>
                        <a href="product_details.html"><?php echo $cust['brand']; ?></a>
                    </h3>
                    <p><?php echo $cust['name']; ?></p>
                </article>
            </div>
        <?php } ?>
    </div>
<?php
}