
<h1><?= __('pricingtable.price.list'); ?></h1>

<?= \Form::open(); ?>
<table class="table">
    <thead>
        <td></td>
        <td><?= __('pricingtable_model_price.title'); ?></td>
        <td><?= __('pricingtable_model_price.price'); ?></td>
        <td></td>
    </thead>
    
    <?php foreach($pricingtable->prices as $price): ?>
    <tr>
        <td>
            <span class="glyphicon glyphicon-align-justify"></span>
            <?= Form::hidden('prices['.$price->id.']', $price->position, array('class' => 'position')); ?> 
        </td>
        <td><?= $price->title; ?></td>
        <td><?= $price->price; ?> <?= $price->currency; ?> <?= $price->price_text; ?></td>
        <td>
            <a href="/pricingtable/backend/price/delete/<?= $price->id; ?>" class="btn btn-danger">
                <?= __('pricingtable.delete'); ?>
            </a>
            <a href="/pricingtable/backend/price/add/<?= $pricingtable->id; ?>/<?= $price->id; ?>" class="btn btn-warning">
                <?= __('pricingtable.edit'); ?>
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="/pricingtable/backend/price/add/<?= $pricingtable->id; ?>" class="btn btn-info"><?= __('pricingtable.create'); ?></a>

<?= \Form::submit('change_position', __('pricingtable.save_position'), array('disabled' => 'disabled', 'class' => 'btn btn-inverse')); ?>
<?= \Form::close(); ?>

 <script type="text/javascript">
        $(document).ready(function() {
            // Sortable row
            var fixHelper = function(e, ui) {
                ui.children().each(function() {
                    $(this).width($(this).width());
                });
                return ui;
            };
            // Sortable
            $('.table tbody').sortable({
                helper: fixHelper,
                update: function(event, ui) {
                    $('#form_change_position').removeAttr('disabled').attr('class', 'btn btn-success');
                    refreshAttributeValuePosition();
                }
            });
            
            function refreshAttributeValuePosition()
            {
                 $('.table tbody tr').each(function() {
                    var pos = eval($(this).index() + 1);
                    $(this).find('.position').val(pos);
                });
            }
        });
</script>