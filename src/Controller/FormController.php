<?php

namespace Php\JsonContactusForm\Controller;

use JetBrains\PhpStorm\NoReturn;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class FormController
{
    /** @var array|null $json */
    private array|null $formFields;

    /** @var PHPMailer $mailer */
    private PHPMailer $mailer;

    /**
     *
     */
    public function __construct(PHPMailer $mailer)
    {
        $filePath = __DIR__ . '/../../form.json';
        $fileContent = file_get_contents($filePath, 'form.json');
        $this->formFields = json_decode($fileContent, true);
        $this->mailer = $mailer;
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

    /**
     * @param array $data
     * @throws Exception
     */
    public function post(array $data)
    {
        list ($errorCount, $errors) = $this->validateFormData($data);
        if ($errorCount > 0) {
            echo json_encode(['status' => 'error', 'errors' => $errors]);
        } else {
            $this->mailer->Body = $this->loadMailTemplate($data);
            $this->mailer->AltBody = "This is the plain text version of the email content";

            //$this->mailer->addAddress("qaiser@newrich.com", "Qaiser Newrich");//Recipient name is optional
            $this->mailer->addAddress("zeeshanbutt223@gmail.com", "Zeeshan Iqbal");//Recipient name is optional
            $this->mailer->addAddress("noreply@almerajgroups.com", "Reply - Dynamic Form Assignment"); //Address to which recipient will reply

            if (!$this->mailer->send()) {
                echo json_encode([
                    'status' => 'success',
                    'message' => "Mailer Error: " . $this->mailer->ErrorInfo
                ]);
            } else {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'email sent successfully',
                ]);
            }
        }
        return;
    }

    /**
     * @param array $data
     * @return array
     */
    private function validateFormData(array $data): array
    {
        $keys = $this->extractKeys();
        $errors = array();
        foreach ($keys as $key) {
            if (empty($data[$key])) $errors[$key] = "{$key} is required";
        }

        return [count($errors), $errors];
    }

    /**
     * @return array
     */
    private function extractKeys(): array
    {
        return array_column($this->formFields, 'name');
    }

    public function loadMailTemplate(array $data = array()): bool|string
    {
        $filePath = __DIR__ . '/../View/';
        $view = 'mail_template.php';

        // Extract the variables to a local namespace
        extract($data);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath . $view;

        // End buffering and return its contents
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}