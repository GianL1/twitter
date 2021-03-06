<?php 
namespace Models;

use \Core\Model;
use \Models\Usuarios;

class Perfil extends Model {

    public function getPerfil($id_perfil) {

        

        $array = array();

        $sql = $this->pdo->prepare("SELECT usuarios.id as id_usuario, usuarios.nome, posts.id as id_post, posts.mensagem, imagem_post.url as url_post, 
        (SELECT COUNT(*) FROM curtidas WHERE curtidas.id_post = posts.id) as curtidas, 
        (SELECT curtidas.id_usuario FROM curtidas WHERE curtidas.id_post = posts.id ) as id_curtidores 
        FROM usuarios 
        LEFT JOIN posts ON usuarios.id = posts.id_usuario 
        LEFT JOIN imagem_post ON usuarios.id = imagem_post.id_usuario WHERE usuarios.id = :id_perfil");
        $sql->bindValue(":id_perfil", $id_perfil);
        $sql->execute();  

        if($sql->rowCount() > 0) {
            
            $array = $sql->fetchAll();
            

        }else {
            $array['id_usuario'] = $id_perfil;
        }
        return $array;
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
        
        $sql = $this->pdo->prepare("SELECT url FROM imagem_perfil WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $id_user);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $url = $sql->fetch();
            $filename ='Images/posts/'.$url['url'];
            
            unlink($filename);
            
            $sql = $this->pdo->prepare("DELETE FROM imagem_perfil WHERE id_usuario = :id_usuario");
            $sql->bindValue(":id_usuario", $id_user);
            $sql->execute();
            
        }    
        
        $sql = $this->pdo->prepare("INSERT INTO imagem_perfil SET id_usuario = :id_usuario, url = :url");
        $sql->bindValue(":id_usuario", $id_user);
        $sql->bindValue(":url", $nomedoarquivo);
        $sql->execute();
    }
}