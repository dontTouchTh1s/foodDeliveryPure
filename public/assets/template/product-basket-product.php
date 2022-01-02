<?php
/** @var array $product */
/** @var array $productBasketList */
/** @var array $productBasketListInfo */
/** @var int $itemPrice */

?>
<div class="product" product-id="<?= $product['id'] ?>">
    <div class="product-card">
        <?php
        $card = new card(CARD_FILLED, $product['id']);
        $card->title($product['name']);
        $card->price($product['price']);
        $card->picture($product['pictures']);
        $card->action(CARD_ACTION_LIKE);
        $card->action(CARD_ACTION_BOOKMARK);
        $card->add();
        ?>
    </div>
    <div class="product-information">
        <p class="product-title"><?= $product['name'] ?></p>
        <p class="product-subhead"></p>
        <p class="information">
            <?= $product['description'] ?>
        </p>
        <div class="footer">
            <div class="product-qty">
                <button type="button" class="btn btn-icon remove-from-basket">
                    <i class='fas fa-trash'></i>
                </button>
                <div class='qty'>
                    <button type='button' class='btn btn-icon increase'>
                        <i class='fas fa-plus'></i>
                    </button>
                    <span class='qty-count'><?= $productBasketList[array_search($product, $productBasketListInfo)][2] ?></span>
                    <button type='button' class='btn btn-icon decrease'>
                        <i class='fas fa-minus'></i>
                    </button>
                </div>
            </div>
            <div class="item-total-price">
                <p class="price item-price"><?= $itemPrice ?>
                    <span>تومان</span></p>
            </div>
        </div>
    </div>
</div>
