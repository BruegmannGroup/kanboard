ModalFormExample plugin for Kanboard

This example plugin demonstrates how to open a modal form and handle submission using Kanboard's ModalHelper and FormHelper.

Installation

1. Copy the folder "ModalFormExample" into your Kanboard "plugins" directory (already added in this repository under plugins/).
2. Go to Kanboard administration -> Plugins and click "Refresh" if necessary.
3. Install the plugin from the plugin list.

Usage

- A small button labeled "Open sample form" is attached to the project sidebar. Clicking it opens a modal form.
- The modal displays two fields. The example validates the "first_field" as required; on success it redirects to the task view (if a task_id parameter was provided) or to the project view.

Files

- Plugin.php: plugin registration and hook attachment.
- Controller/ModalFormExampleController.php: controller with myform() action handling GET and POST.
- Template/modal/button.php: button injected via hook to open the modal.
- Template/modal/form.php: the form displayed inside the modal.

Notes

- The plugin uses the helper APIs described in Kanboard documentation:
  - ModalHelper: open modals from templates
  - FormHelper: build forms and handle CSRF / errors

- If you want the modal to redirect back to the current page after submission, add extra params (for example, 'task_id' => $task['id']) in the modal->small call.

Customization

- Change validation or persistence logic in the controller.
- Attach the button to a different hook by editing Plugin.php (see available template hooks in Kanboard core).
