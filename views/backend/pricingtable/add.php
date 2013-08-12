<h1><?= __('pricingtable.pricingtable.create'); ?></h1>

<?= \Form::open(array('class' => 'form-horizontal')); ?>
<?= $form->field('title')->set_attribute(array('class' => 'form-control')); ?>
<?= $form->field('id_pricingtable_theme')->set_attribute(array('class' => 'form-control')); ?>
<div class="clearfix"></div>
<h2><?= __('pricingtable.attribute_title.list'); ?></h2>
<div class="well">
    <table class="table table-attribute-title">
        <thead>
            <th></th>
            <th>ID</th>
            <th><?= __('pricingtable_model_attribute_title.title'); ?></th>
            <th></th>
        </thead>

        <tbody>
            <?php foreach($pricingtable->attributes_title as $attribute_title): ?>
            <tr>
                <td>
                    <span class="glyphicon glyphicon-align-justify"></span>
                    <?= Form::hidden('attributes_title['.$attribute_title->id.'][position]', $attribute_title->position, array('class' => 'position')); ?>
                </td>
                <td><?= $attribute_title->id; ?></td>
                <td><?= \Form::input('attributes_title['.$attribute_title->id.'][title]', $attribute_title->title, array('class' => 'form-control')); ?></td>
                <td>
                    <a href="#" class="delete-attribute-title btn btn-danger"><?= __('pricingtable.delete'); ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="#" class="create-attribute-title btn btn-info"><?= __('pricingtable.attribute_title.create_to'); ?></a>
</div>

<?= $form->field('add'); ?>

<?= \Form::close(); ?>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.table-attribute-title').on('click', '.delete-attribute-title', function() {
                $(this).parent().parent().remove();
                refreshAttributeTitlePosition();
            });
            
            $('.create-attribute-title').on('click', function() {
                theTr = getNewAttributeTitleTr('new');
                
                $('.table-attribute-title tbody').append(theTr);
                refreshAttributeTitlePosition();
            });
            
            function getNewAttributeTitleTr(id, title)
            {
                if (id == 'new') {
                    var uniqId = (new Date().getTime()).toString(16);
                    theTr = $('<tr></tr>')
                    .append($('<td></td>').append($('<span></span>').attr({class: 'glyphicon glyphicon-align-justify'})).append($('<input/>').attr({type: 'hidden', name: 'attributes_title[new]['+uniqId+'][position]', class: 'position'})))
                    .append($('<td></td>'))
                    .append($('<td></td>').append($('<input/>').attr({type: 'text', name: 'attributes_title[new]['+uniqId+'][title]', class: 'form-control'})))
                    .append($('<td></td>').append($('<a></a>').attr({href: '#', class: 'delete-attribute-title btn btn-danger'}).html('<?= __('pricingtable.delete'); ?>')));
            
                    return theTr;
                }
            }
            
            // Sortable row
            var fixHelper = function(e, ui) {
                ui.children().each(function() {
                    $(this).width($(this).width());
                });
                return ui;
            };
            // Sortable
            $('.table-attribute-title tbody').sortable({
                helper: fixHelper,
                update: function(event, ui) {
                    refreshAttributeTitlePosition();
                }
            });
            
            function refreshAttributeTitlePosition()
            {
                 $('.table-attribute-title tbody tr').each(function() {
                    var pos = eval($(this).index() + 1);
                    $(this).find('.position').val(pos);
                });
            }
        });
    </script>