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
        
        return $this->pdo->lastInsertId();

    }
    
    public function getFeed($lista, $limit) {
        $array = array();
        
        if(count($lista) > 0) {
            $sql = $this->pdo->query("SELECT *, (SELECT nome FROM usuarios WHERE usuarios.id = posts.id_usuario) as nome, 
			                                     (SELECT url FROM imagem_post WHERE imagem_post.id_post = posts.id) as url_post FROM posts 
            LEFT JOIN imagem_perfil ON posts.id_usuario = imagem_perfil.id_usuario 
            LEFT JOIN curtidas ON posts.id = curtidas.id_post WHERE posts.id_usuario IN(".implode(',', $lista).") ORDER BY posts.data_post DESC LIMIT ".$limit);
            
            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }
        }
        return $array;
    }
    
    public function inserirImagemPost($nome_imagem, $id_post) {

        $id_usuario = $_SESSION['twlg'];
        
        $sql = $this->pdo->prepare("INSERT INTO imagem_post SET id_post = :id_post, id_usuario = :id_usuario, url= :url");
        $sql->bindValue(":id_post", $id_post);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->bindValue(":url", $nome_imagem);
        $sql->execute();
    }
    
    public function curtirPost($id_post) {
        
      
        $id_usuario = $_SESSION['twlg'];
        
        $sql = $this->pdo->prepare("INSERT INTO curtidas SET id_post = :id_post, id_usuario = :id_usuario");
        $sql->bindValue(":id_post", $id_post);
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();
        
    }
}
