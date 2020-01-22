<?php 

namespace Controllers;

use \Core\Controller;
use \Models\Posts;

class PostController extends Controller {
    
    public function curtir($id_post) {
        $p = new Posts();
        $p->curtirPost($id_post);
        
        header("Location: ". BASE_URL);
    }
}