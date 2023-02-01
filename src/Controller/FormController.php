<?php

namespace Php\JsonContactusForm\Controller;

class FormController
{
    /** @var string $filePath */
    private string $filePath;

    /** @var false|string $fileContent */
    private string|false $fileContent;

    /** @var array|null $json */
    private array|null $formFields;

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->fileContent = file_get_contents($this->filePath, 'form.json');
        $this->formFields = json_decode($this->fileContent, true);
    }

    /**
     * @return void
     */
    public function __invoke()
    {
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
}