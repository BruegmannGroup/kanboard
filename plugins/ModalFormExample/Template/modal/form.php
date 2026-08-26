<?php
// Modal form template. The controller renders this template and passes 'task_id', 'errors' and 'values'.
// Uses FormHelper and ModalHelper per Kanboard docs.
?>

<form method="post" action="<?= $this->url->href('ModalFormExampleController', 'myform', array('plugin' => 'ModalFormExample', 'task_id' => $task_id)) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <?= $this->form->label(t('Single line field'), 'first_field') ?>
    <?= $this->form->text('first_field', isset($values) ? $values : array(), isset($errors) ? $errors : array()) ?>
    <br>

    <?= $this->form->label(t('Text area field'), 'second_field') ?>
    <?= $this->form->textarea('second_field', isset($values) ? $values : array(), isset($errors) ? $errors : array()) ?>

    <?= $this->modal->submitButtons() ?>
</form>
