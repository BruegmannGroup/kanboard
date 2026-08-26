<?php

namespace Kanboard\Plugin\ModalFormExample\Controller;

use Kanboard\Controller\PluginController;

class ModalFormExampleController extends PluginController
{
    // Display a simple page (not required for modal) just for debug/demo
    public function index()
    {
        $this->response->html($this->template->render('modalformexample:modal/button', array()));
    }

    // Action used by the modal to show the form and handle submission
    public function myform()
    {
        $task_id = $this->request->getIntegerParam('task_id', 0);
        $values = array();
        $errors = array();

        if ($this->request->isPost()) {
            $values = $this->request->getValues();

            // Simple validation example: require first_field
            if (empty($values['first_field'])) {
                $errors['first_field'] = array(t('This field is required'));
            }

            if (empty($errors)) {
                $this->flash->success(t('My form was successful'));

                // Redirect to the task view if task_id present, otherwise redirect to project overview
                if ($this->request->getIntegerParam('task_id') > 0) {
                    $this->response->redirect($this->helper->url->to('TaskViewController', 'show', array('task_id' => $this->request->getIntegerParam('task_id'))), true);
                } else {
                    $this->response->redirect($this->helper->url->to('ProjectController', 'show', array('project_id' => $this->request->getIntegerParam('project_id'))), true);
                }
                return;
            }

            // On error: re-render the form inside the modal with errors and previously submitted values
            $this->flash->failure(t('My form failed'));
            $this->response->html($this->template->render('modalformexample:modal/form', array(
                'task_id' => $task_id,
                'errors' => $errors,
                'values' => $values,
            )));
            return;
        }

        // First display
        $this->response->html($this->template->render('modalformexample:modal/form', array(
            'task_id' => $task_id,
            'errors' => $errors,
            'values' => $values,
        )));
    }
}
