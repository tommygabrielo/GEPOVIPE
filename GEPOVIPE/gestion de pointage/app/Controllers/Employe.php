<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Employe_model;

class Employe extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Employe_model();
        $db = \Config\Database::connect();
        $data['fonction']  = $model->getFonction()->getResult();
        echo view('employe',$data);
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();

        helper(['form'], ['url']);
        $model = new Employe_model();
        $db=$model->getEmploye($param)->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {

        helper(['form']);
        $model = new Employe_model();
        $NUMEMP      = $this->request->getpost ('NUMEMP');
        $NUMFONCT      = $this->request->getpost ('NUMFONCT');
        $NOMEMP      = $this->request->getpost ('NOMEMP');
        $PRENOMEMP      = $this->request->getpost ('PRENOMEMP');
        $CONTACT      = $this->request->getpost ('CONTACT');
        $model->saveEmploye($NUMEMP,$NUMFONCT,$NOMEMP, $PRENOMEMP,$CONTACT);
       
    }

    public function update()
    {
        helper(['form']);
        $model = new Employe_model();
        $id = $this->request->getPost('NUMEMP');
        $NUMFONCT      = $this->request->getpost ('NUMFONCT');
        $NOMEMP      = $this->request->getpost ('NOMEMP');
        $PRENOMEMP      = $this->request->getpost ('PRENOMEMP');
        $CONTACT      = $this->request->getpost ('CONTACT');
        $model->updateEmploye($id,$NUMFONCT,$NOMEMP,$PRENOMEMP,$CONTACT);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Employe_model();
        $id = $this->request->getPost('EMP');
        $data=$model->deleteEmploye($id);
       
    }

}