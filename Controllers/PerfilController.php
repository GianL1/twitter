<?php
namespace Controllers;

use \Core\Controller;
use \Models\Perfil;
use \Models\Usuarios;



class PerfilController extends Controller {
    
    public function mostrar ($id_usuario) {
 
        $dados = array(
            'nome' => ''
        );
        
        $pf = new Perfil();
        $dados['perfil'] = $pf->getPerfil($id_usuario);
        $dados['nome'] = $pf->getDadosLogado($_SESSION['twlg']);
        
        $this->loadTemplate('perfil', $dados);
    }
    
    public function editarFoto() {
        $dados = array(
            'nome' => ''
        );
        
        $u = new Usuarios();
        
        $dados['id_user'] = $_SESSION['twlg'];
        $dados['nome'] = $u->getNome();
        
        
        if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
        
            
            $arquivo = $_FILES['foto'];
            $nomedoarquivo = md5(time()).'.png';
            
            move_uploaded_file($arquivo['tmp_name'],"Images/thumb/".$nomedoarquivo);
            
            $pf = new Perfil();
            $pf->mudarFoto($_SESSION['twlg'], $nomedoarquivo);
            
            header("Location: ".BASE_URL);
        }
        
        $this->loadTemplate('altera_foto', $dados);
    }
    
    
}