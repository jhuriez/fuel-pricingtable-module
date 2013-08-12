<?php 
    $i=0; 
    $currentPrice = current($pricingtable->prices);
?>
<table class="table3">
    <thead>
        <tr>
            <th></th>
            <?php foreach($pricingtable->prices as $price): ?>
                <th scope="col" abbr="<?= $price->title; ?>">
                    <?= $price->title; ?>
                </th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th scope="row"><?= $currentPrice->price_text; ?></th>
            <?php foreach($pricingtable->prices as $price): ?>
                <td><?= $price->currency; ?> <?= $price->price; ?></td>
            <?php endforeach; ?>
        </tr>
    </tfoot>
    <tbody>
        <?php for($i=1;$i <= $pricingtable->nb_max_attribute; $i++): ?>
            <tr>
                <th scope="row">
                        <?= (isset($pricingtable->attributes_title[$i])) ? $pricingtable->attributes_title[$i]->title : ''; ?>
                </th>
                <?php foreach($pricingtable->prices as $price): ?>
                <?php if(isset($price->attributes_value[$i])): ?>
                <?php
                    $isChecked = strstr($price->attributes_value[$i]->title, '[check]') ? true : false;
                ?>
                    <td>
                        <?= ($isChecked) ? '<span class="check"></span>' : $price->attributes_value[$i]->title; ?>
                    </td>
                <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>