<?php
namespace Models;

use \Core\Model;

class Posts extends Model {
    
    public function inserirPost($msg) {
    
        $id_usuario = $_SESSION['twlg'];

        $sql = $this->pdo->prepare("INSERT INTO posts SET id_usuario = :id_usuario, data_post = NOW(), mensagem = :msg");   
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":msg", $msg);
        $sql->execute();

    }
    
    public function getFeed($lista, $limit) {
        $array = array();
        
        if(count($lista) > 0) {
            $sql = $this->pdo->query("SELECT *, (SELECT nome FROM usuarios WHERE usuarios.id = posts.id_usuario) as nome, imagem_perfil.url
            FROM posts
            LEFT JOIN imagem_perfil ON posts.id_usuario = imagem_perfil.id_usuario
            WHERE posts.id_usuario IN(".implode(',', $lista).") ORDER BY posts.data_post DESC LIMIT ".$limit);
            
            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }
        }
        return $array;
    }
}
