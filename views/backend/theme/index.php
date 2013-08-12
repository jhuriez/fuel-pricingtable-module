
<h1><?= __('pricingtable.theme.list'); ?></h1>

<table class="table">
    <thead>
        <td><?= __('pricingtable_model_theme.name'); ?></td>
        <td><?= __('pricingtable_model_theme.file'); ?></td>
        <td></td>
    </thead>
    
    <?php foreach($themes as $theme): ?>
    <tr>
        <td><?= $theme->name; ?></td>
        <td><?= $theme->file; ?></td>
        <td>
            <a href="/pricingtable/backend/theme/delete/<?= $theme->id; ?>" class="btn btn-danger">
                <?= __('pricingtable.delete'); ?>
            </a>
            <a href="/pricingtable/backend/theme/add/<?= $theme->id; ?>" class="btn btn-warning">
                <?= __('pricingtable.edit'); ?>
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="/pricingtable/backend/theme/add/" class="btn btn-info"><?= __('pricingtable.create'); ?></a>