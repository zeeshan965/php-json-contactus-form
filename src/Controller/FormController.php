<?php

namespace Php\JsonContactusForm\Controller;

use JetBrains\PhpStorm\NoReturn;

class FormController
{
    /** @var array|null $json */
    private array|null $formFields;

    /**
     * @return void
     */
    public function __invoke()
    {
        $filePath = __DIR__ . '/../../form.json';
        $fileContent = file_get_contents($filePath, 'form.json');
        $this->formFields = json_decode($fileContent, true);
        $this->view();
    }

    /**
     *
     */
    private function view()
    {
        $filePath = __DIR__ . '/../View/';
        $view = 'index.php';
        $data = array('title' => 'Contact Us Form', 'formFields' => $this->formFields);
        $this->loadView($filePath, $view, $data);
    }

    /**
     * @param $filePath
     * @param $view
     * @param array $data
     */
    private function loadView($filePath, $view, array $data = array())
    {
        $directoryExists = scandir($filePath);
        $fileExist = file_exists($filePath . $view);
        $output = NULL;
        if ($directoryExists && $fileExist) {
            // Extract the variables to a local namespace
            extract($data);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath . $view;

            // End buffering and return its contents
            $output = ob_get_contents();
            ob_end_clean();
        }

        if (true) print $output;
    }

    /**
     * @param array $data
     */
    public function post(array $data)
    {
        list ($errorCount, $errors) = $this->validateFormData($data);
        if ($errorCount > 0) {
            echo json_encode($errors);
        } else {
            //send the email to user
            echo json_encode(['status' => 'success']);
        }
        return;
    }

    /**
     * @param array $data
     * @return array
     */
    private function validateFormData(array $data): array
    {
        $errors = array();
        if (empty($data['text'])) {
            $errors['text'] = "Text is required";
        }
        if (empty($data['textarea'])) {
            $errors['textarea'] = "Textarea is required";
        }
        if (empty($data['password'])) {
            $errors['password'] = "Password is required";
        }
        if (empty($data['select'])) {
            $errors['select'] = "Select is required";
        }
        if (empty($data['radio'])) {
            $errors['radio'] = "Radio is required";
        }
        if (empty($data['checkbox'])) {
            $errors['checkbox'] = "Checkbox is required";
        }

        return [count($errors), $errors];
    }
}