<?php 
namespace Models;

use \Core\Model;
use \Models\Usuarios;

class Perfil extends Model {

    public function getPerfil($id_perfil) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT posts.data_post, posts.mensagem, imagem_perfil.url, usuarios.id as id_usuario, usuarios.nome as nome_perfil 
        FROM posts 
        LEFT JOIN usuarios ON posts.id_usuario = usuarios.id 
        LEFT JOIN imagem_perfil ON posts.id_usuario = imagem_perfil.id_usuario 
        WHERE posts.id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $id_perfil);
        $sql->execute();  

        if($sql->rowCount() > 0) {
            
            $array = $sql->fetchAll();

        }
        return $array;
    }

    public function getSeguidores($id_perfil) {

    }

    public function getSeguidos($id_perfil) {

    }
    
    public function getDadosLogado($id_logado) {

        $sql = $this->pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id_logado);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
        }
        
        return $sql['nome'];
        
        
    }
    
    public function mudarFoto($id_user, $nomedoarquivo) {
        
        $sql = $this->pdo->prepare("DELETE FROM imagem_perfil WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $id_user);
        $sql->execute();
        
        $sql = $this->pdo->prepare("INSERT INTO imagem_perfil SET id_usuario = :id_usuario, url = :url");
        $sql->bindValue(":id_usuario", $id_user);
        $sql->bindValue(":url", $nomedoarquivo);
        $sql->execute();
    }
}