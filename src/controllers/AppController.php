<?php

class AppController {

    private $request;

    public function __construct() {
        $this->request = $_SERVER["REQUEST_METHOD"];
    }

    protected function isPost() {
        return $this->request === 'POST';
    }

    protected function isGet() {
        return $this->request === 'GET';
    }

    protected function render(string $template = null, array $variables = []) {
        $templatePath = 'public/views/' . $template . '.php';

        if (!file_exists($templatePath)) {
            die("no file found!");
        }

        extract($variables);

        ob_start(); //zapisuje plik html'owy do bufora
        include $templatePath;
        print ob_get_clean(); //ob_get_clean() zwraca to co jeset w buforze
    }
}

?>