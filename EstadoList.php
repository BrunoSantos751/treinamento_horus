<?php
require_once 'classes/Estado.php';
class EstadoList {
    private $html;
    public function __construct() {
        $this->html = file_get_contents('html/list_estado.html');
    }
    public function show() {
        $estados = '';
        try {
            $estados = '';
            foreach (Estado::all() as $estado) {
                $estado .= file_get_contents('html/item_estado.html');
                $estado = str_replace('{id}', $estado->id, $estado);
                $estado = str_replace('{nome}', $estado->nome, $estado);
                $estado = str_replace('{sigla}', $estado->sigla, $estado);
                $estados .= $estado;
            }
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
        $this->html = str_replace('{estados}', $estados, $this->html);
        print $this->html;
    }
    public function delete($param) {
        try {
            $id = (int) $param['id'];
            Estado::delete($id);
            print "Estado excluído com sucesso";
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }
}