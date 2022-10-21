<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Visite_model;

class Visite extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Visite_model();
        $db = \Config\Database::connect(); 
        $data['fonction'] = $model->getFonction()->getResult();    
        echo view('visite',$data);      
        
    }

    public function service($service = "")
    {
        $db = \Config\Database::connect();
        $model = new Visite_model();
        $db=$model->getEmploye($service)->getResult();     
        echo json_encode($db);     
    }

    public function affiche($para="")
    {
        $db = \Config\Database::connect();
        $model = new Visite_model();
        $db=$model->getVisite($para)->getResult();     
        echo json_encode($db);      
    }


    // ---------------------------------sauvegarde
    public function save()
    {
       
        $model = new Visite_model();   
            $NOMVISITEUR = $this->request->getpost ('NOMVISITEUR');
            $NUMCIN       = $this->request->getpost ('NUMCIN');
            $DIRECTION       = $this->request->getpost ('NUMEMP');
            $OBSERVATION  = $this->request->getpost ('OBSERVATION');           
        $model->saveVisite($NOMVISITEUR , $NUMCIN ,$DIRECTION, $OBSERVATION);
       
        echo json_encode($model);
        
    }
   
    
    // -----------------------------------modification
    public function update()
    {
       
        $model = new Visite_model();
        $id = $this->request->getPost('IDVISITE');
        $model->updateVisite($id);
        echo json_encode($model);
       

    }


}

 