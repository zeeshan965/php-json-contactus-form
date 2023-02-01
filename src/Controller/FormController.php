<?php

namespace src\Controller;

class FormController
{
    /** @var string $filePath */
    private $filePath;

    /** @var false|string $fileContent */
    private $fileContent;

    /** @var array|null $json */
    private $formFields;

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
        //dd($this->formFields);
    }

    private function view()
    {
        $this->loadFile();
    }

    private function loadFile()
    {
        require('index.php');
        $json_file = '../View/index.php';
        dd( $json_file);
        echo include_once($json_file);
    }
}