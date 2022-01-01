<?php
?>
<div class="product">
    <div class="product-card">
        <?php
        $card = new card(CARD_FILLED, $product[0]);
        $card->title($product[3]);
        $card->picture($product[6]);
        $card->action(CARD_ACTION_LIKE);
        $card->action(CARD_ACTION_BOOKMARK);
        $card->add();
        ?>
    </div>
    <div class="product-information">
        <p class="product-title"><?= $product[3] ?></p>
        <p class="product-subhead"><?= $product[4] ?></p>
        <div class="information">
            <?= $product[5] ?>
        </div>
    </div>
</div>
