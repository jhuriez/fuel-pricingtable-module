<?php 
    $i=0; 
?>
<table class="pricing-table">
    <thead>
        <tr class="plan">
        <?php foreach($pricingtable->prices as $price): ?>
            <td class="<?= ($price->is_popular) ? 'orange' : 'green'; ?>">
                <h2><?= $price->title; ?></h2>
                <em><?= $price->price_small_text; ?></em>
            </td>
        <?php endforeach; ?>
        </tr>
        <tr class="price">
        <?php foreach($pricingtable->prices as $price): ?>
            <td class="<?= ($price->is_popular) ? 'orange' : 'green'; ?>">
                <p><span><?= $price->currency; ?></span><?= $price->price; ?></p>
                <span><?= $price->price_text; ?></span>
                <a href="<?= \LbPricingTable\Pricingtable::render_uri($price->button_action_url); ?>">
                    <?= $price->button_action_text; ?>
                </a>
            </td>
        <?php endforeach; ?>
        </tr>
    </thead>
 
    <tbody>
        <?php for($i=1;$i <= $pricingtable->nb_max_attribute; $i++): ?>
            <tr>
                <?php foreach($pricingtable->prices as $price): ?>
                <?php if(isset($price->attributes_value[$i])): ?>
                    <td>
                        <?= $price->attributes_value[$i]->title; ?>
                        <?= (isset($pricingtable->attributes_title[$i])) ? $pricingtable->attributes_title[$i]->title : ''; ?>
                    </td>
                <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
 
    <tfoot>
        <tr>
            <?php foreach($pricingtable->prices as $price): ?>
                <td><?= $price->small_text; ?></td>
            <?php endforeach; ?>
        </tr>
    </tfoot>
</table>