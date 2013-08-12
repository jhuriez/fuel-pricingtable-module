<h1><?= __('pricingtable.theme.create'); ?></h1>

<?= \Form::open(array('class' => 'form-horizontal')); ?>
<?= $form->field('name')->set_attribute(array('class' => 'form-control')); ?>
<?= $form->field('file')->set_attribute(array('class' => 'form-control')); ?>
<?= $form->field('css_file')->set_attribute(array('class' => 'form-control')); ?>
<?= $form->field('js_file')->set_attribute(array('class' => 'form-control')); ?>
<?= $form->field('add'); ?>
<?= \Form::close(); ?>