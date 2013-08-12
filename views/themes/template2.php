<?php $i=0; ?>
<div id="fdw-pricing-table">
    <?php foreach($pricingtable->prices as $price): ?>
    <?php $i++; ?>
    <div class="plan plan<?= $i; ?> <?= ($price->is_popular) ? 'popular-plan':''; ?>">
        <div class="header"><?= $price->title; ?></div>
        <div class="price"><?= $price->currency.$price->price; ?></div>  
        <div class="monthly"><?= $price->price_text; ?></div>      
        <ul>
            <?php foreach($price->attributes_value as $attribute): ?>
            <li><b><?= $attribute->title; ?></b> <?= (isset($pricingtable->attributes_title[$attribute->position])) ? $pricingtable->attributes_title[$attribute->position]->title : ''; ?></li>
            <?php endforeach; ?>
        </ul>
        <a class="signup" href="<?= \LbPricingTable\Pricingtable::render_uri($price->button_action_url); ?>">
            <?= $price->button_action_text; ?>
        </a>         
    </div>
    <?php endforeach; ?>	
</div>
