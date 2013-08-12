
<h1><?= __('pricingtable.pricingtable.list'); ?></h1>

<table class="table">
    <thead>
        <td></td>
        <td><?= __('pricingtable_model_pricingtable.title'); ?></td>
        <td></td>
    </thead>
    
    <?php foreach($pricingtables as $pricingtable): ?>
    <tr>
        <td></td>
        <td><?= $pricingtable->title; ?></td>
        <td>
            <a href="/pricingtable/backend/pricingtable/delete/<?= $pricingtable->id; ?>" class="btn btn-danger">
                <?= __('pricingtable.delete'); ?>
            </a>
            <a href="/pricingtable/backend/pricingtable/add/<?= $pricingtable->id; ?>" class="btn btn-warning">
                <?= __('pricingtable.edit'); ?>
            </a>
            <a href="/pricingtable/backend/pricingtable/view/<?= $pricingtable->id; ?>" class="btn btn-primary">
                <?= __('pricingtable.select'); ?>
            </a>
            <a href="/pricingtable/backend/pricingtable/preview/<?= $pricingtable->id; ?>" class="btn btn-info">
                <?= __('pricingtable.preview'); ?>
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="/pricingtable/backend/pricingtable/add/" class="btn btn-info"><?= __('pricingtable.create'); ?></a>