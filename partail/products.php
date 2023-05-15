<div class="products-container">
    <h1>products</h1>
    <div class="products-card-container" id="products-card-container">
        <?php foreach($products as $product){?>
        <div class="product-card">
            <div class="product-img" >
                <img src=<?php echo $target_dir.$product['productImage'];?> alt="" style="height:180px; object-fit:cover">
            </div>
            <div class="product-content">
                <h2><?php echo $product['productName']?></h2>
                <p class="meta-description">
                    <?php echo $product['productPrice'];?>
                </p>
            </div>
            <div class="product-action">
                <button>buy</button>
                <button>read more</button>
            </div>
        </div>
        <?php }?>
        
    </div>
</div>
