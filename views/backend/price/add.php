<h1><?= __('pricingtable.price.create'); ?></h1>
<br/>
<?= \Form::open(array('class' => 'form-horizontal')); ?>

<div class="row">
    <div class="col-12">
        <?= $form->field('title')->set_attribute(array('class' => 'form-control')); ?>
        
        <div class=" form-group row">
            <label id="label_price" for="form_price" class="control-label col-lg-2"><?= __('pricingtable_model_price.price'); ?></label>
            <div class="col-lg-2">
                <?= \Form::input('price', (\Input::post('price')) ? : $price->price, array('class' => 'form-control')); ?>
            </div>
            <div class="col-lg-2">
                <?= \Form::select('currency', (\Input::post('currency')) ? : $price->currency, \Config::get('lbpricingtable.currency'), array('class' => 'form-control')); ?>
            </div>
            <div class="col-lg-6">
                <?= \Form::input('price_text', (\Input::post('price_text')) ? : $price->price_text, array('class' => 'form-control')); ?>
            </div>
        </div>
        
        <?= $form->field('price_small_text')->set_attribute(array('class' => 'form-control')); ?>
        <?= $form->field('button_action_text')->set_attribute(array('class' => 'form-control')); ?>
        <?= $form->field('button_action_url')->set_attribute(array('class' => 'form-control')); ?>
        <?= $form->field('is_new')->set_attribute(array('class' => 'form-control')); ?>
        <?= $form->field('is_popular')->set_attribute(array('class' => 'form-control')); ?>
        <?= $form->field('small_text')->set_attribute(array('class' => 'form-control')); ?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h2><?= __('pricingtable.attribute_value.list'); ?></h2>
        <div class="well">
            <div class="row">
                
            <?php if(count($pricingtable->attributes_title) > 0): ?>
            <div class="col-2">
                <table class="table table-attribute-title-info">
                    <thead>
                        <th><?= __('pricingtable.attribute_title.attribute_title'); ?></th>
                    </thead>

                    <tbody>
                        <?php foreach($pricingtable->attributes_title as $attribute_title): ?>
                        <tr>
                            <td><?= $attribute_title->title; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

            <?php if(count($pricingtable->attributes_title) > 0): ?>
            <div class="col-10">
            <?php else: ?>
                <div class="col-12">
            <?php endif; ?>
            <table class="table table-attribute-value">
                <thead>
                    <th></th>
                    <th>ID</th>
                    <th><?= __('pricingtable_model_attribute_value.title'); ?></th>
                    <th><?= __('pricingtable_model_attribute_value.tooltip_info'); ?></th>
                    <th></th>
                </thead>

                <tbody>
                    <?php foreach($price->attributes_value as $attribute_value): ?>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-align-justify"></span>
                            <?= Form::hidden('attributes_value['.$attribute_value->id.'][position]', $attribute_value->position, array('class' => 'position')); ?>         </td>
                        <td><?= $attribute_value->id; ?></td>
                        <td><?= \Form::input('attributes_value['.$attribute_value->id.'][title]', $attribute_value->title, array('class' => 'form-control')); ?></td>
                        <td><?= \Form::input('attributes_value['.$attribute_value->id.'][tooltip_info]', $attribute_value->tooltip_info, array('class' => 'form-control')); ?></td>
                        <td>
                            <a href="#" class="delete-attribute-value btn btn-danger"><?= __('pricingtable.delete'); ?></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                </div>
            </div>
            <a href="#" class="create-attribute-value btn btn-info"><?= __('pricingtable.attribute_value.create_to'); ?></a>
        </div>

    </div>
<?= $form->field('add'); ?>
</div>
<?= \Form::close(); ?>

 <script type="text/javascript">
        $(document).ready(function() {
            $('.table-attribute-value').on('click', '.delete-attribute-value', function() {
                $(this).parent().parent().remove();
                refreshAttributeValuePosition();
                return false;
            });
            
            $('.create-attribute-value').on('click', function() {
                theTr = getNewAttributeValueTr('new');
                
                $('.table-attribute-value tbody').append(theTr);
                refreshAttributeValuePosition();
                return false;
            });
            
            function getNewAttributeValueTr(id, title, tooltip_info)
            {
                if (id == 'new') {
                    var uniqId = (new Date().getTime()).toString(16);
                    theTr = $('<tr></tr>')
                    .append($('<td></td>')
                            .append($('<span></span>').attr({class: 'glyphicon glyphicon-align-justify'}))
                            .append($('<input/>').attr({type: 'hidden', name: 'attributes_value[new]['+uniqId+'][position]', class: 'position'})))
                    .append($('<td></td>'))
                    .append($('<td></td>')
                            .append($('<input/>').attr({type: 'text', name: 'attributes_value[new]['+uniqId+'][title]', class: 'form-control'})))
                    .append($('<td></td>')
                            .append($('<input/>').attr({type: 'text', name: 'attributes_value[new]['+uniqId+'][tooltip_info]', class: 'form-control'})))
                    .append($('<td></td>')
                            .append($('<a></a>').attr({href: '#', class: 'delete-attribute-value btn btn-danger'}).html('<?= __('pricingtable.delete'); ?>')));
            
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
            $('.table-attribute-value tbody').sortable({
                helper: fixHelper,
                update: function(event, ui) {
                    refreshAttributeValuePosition();
                }
            });
            
            function refreshAttributeValuePosition()
            {
                 $('.table-attribute-value tbody tr').each(function() {
                    var pos = eval($(this).index() + 1);
                    $(this).find('.position').val(pos);
                });
            }
        });
</script>