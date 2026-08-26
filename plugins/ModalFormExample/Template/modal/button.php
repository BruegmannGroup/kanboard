<?php
// Small modal trigger button. Place this in a hook (project sidebar here).
// It will open the modal that calls ModalFormExampleController::myform
?>

<?= $this->modal->small('plus', t('Open sample form'), 'ModalFormExampleController', 'myform', array('plugin' => 'ModalFormExample')) ?>
