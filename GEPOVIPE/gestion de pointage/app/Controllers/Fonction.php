<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Fonction_model;

class Fonction extends Controller
{   

    public function index()
    {
        helper(['form']);
        $model = new Fonction_model();
        $db = \Config\Database::connect();
        $data['font']  = $model->getFonct()->getResult();
       
        echo view('fonction',$data);
        
    }

    public function affiche($para="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Fonction_model();
        $db=$model->getFonction($para)->getResult();
        echo json_encode($db);
    }

   
    public function save()
    {

        helper(['form']);
        $model = new Fonction_model();
        $NOMFONCT      = $this->request->getpost ('NOMFONCT');
        $CATFONCT       = $this->request->getpost ('CATFONCT');
        $model->saveFonction($NOMFONCT, $CATFONCT);
        echo json_encode($model);
        
    }

    public function update()
    {
        helper(['form']);
        $model = new Fonction_model();
        $id = $this->request->getPost('NUMFONCT');
        $NOMFONCT        = $this->request->getpost ('NOMFONCT');
        $CATFONCT       = $this->request->getpost ('CATFONCT');
       
        $model->updateFonction($id,$NOMFONCT, $CATFONCT);
        echo json_encode($model);
       

    }

    public function delete()
    {
        helper(['form']);
        $model = new Fonction_model();
        $id = $this->request->getPost('NUMFONCT');
        $data=$model->deleteFonction($id);
        echo json_encode($data);
        
    }

}