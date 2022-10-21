<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Compte_model;

class Compte extends Controller
{

    public function index()
    {
      
        echo view('compte');
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();

        helper(['form'], ['url']);
        $model = new Compte_model();
        $db=$model->getCompte($param)->getResult();
        
        echo json_encode($db);
  
       
    
    }
    
    public function update()
    {
        helper(['form']);
        $model = new Compte_model();
        $id = $this->request->getPost('NUMSEC');
        $NOMSEC      = $this->request->getpost ('NOMSEC');
        $EMAIL      = $this->request->getpost ('EMAIL');
        $MDP      = $this->request->getpost ('MDP');
        $ROLE      = $this->request->getpost ('ROLE');
      
        $model->updateUt($id,$NOMSEC,$EMAIL,$MDP,$ROLE);
        echo json_encode($model);
       

    }

    public function delete()
    {
        helper(['form']);
        $model = new Compte_model();
        $id = $this->request->getPost('COMPTE');
        $data=$model->deleteCompte($id);
        
    }


}