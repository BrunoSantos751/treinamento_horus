<?php
require_once 'classes/Estado.php';
class EstadoList {
    private $html;
    public function __construct() {
        $this->html = file_get_contents('html/list_estado.html');
    }
    public function load() {
        try {
            $estados = '';
            foreach (Estado::All() as $estado) {
                $item = file_get_contents('html/item_estado.html');
                $item = str_replace('{id}', $estado['id'], $item);
                $item = str_replace('{nome}', $estado['nome'], $item);
                $item = str_replace('{sigla}', $estado['sigla'], $item);
                $estados .= $item;
            }
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
        $this->html = str_replace('{estados}', $estados, $this->html);
    }
    public function show() {
        $this->load();
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