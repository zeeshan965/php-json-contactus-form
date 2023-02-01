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
        dd($this->formFields);
    }
}