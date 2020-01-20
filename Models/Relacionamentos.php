<?php

namespace Models;

use \Core\Model;

class Relacionamentos extends Model {
    
    public function seguir($id_seguidor, $id_seguido) {
        $sql = $this->pdo->query("INSERT INTO relacionamentos SET id_seguidor = '$id_seguidor', id_seguido = '$id_seguido'");
        
    }
    
    public function unfollow($id_seguidor, $id_seguido) {
        $sql = $this->pdo->query("DELETE FROM relacionamentos WHERE id_seguidor = $id_seguidor, id_seguido = $id_seguido");
        
    }
}