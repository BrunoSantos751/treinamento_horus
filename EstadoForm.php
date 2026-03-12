<?php
require_once 'classes/Estado.php';

class EstadoForm {
    private $html;
    private $data;

    public function __construct() {
        $this->html = file_get_contents('html/form_estado.html');
        $this->data = ['id' => null, 'nome' => null, 'sigla' => null];
    }
    public function save ($param) {
        try {
            $estado = new Estado();
            $estado->save($param);
            $this->data = $param;
            print "Estado salvo com sucesso";
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function show() {
        $html = $this->html;
        foreach ($this->data as $key => $value) {
            $html = str_replace("{{$key}}", $value, $html);
        }
        echo $html;
    }
}