<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Heure_model;

class Heure extends Controller
{
    
    public function index()
    {
      
        $model = new Heure_model();
        $db = \Config\Database::connect();  
        $date = $this->request->getPost ('DATE');
        $nom  = $this->request->getPost ('NOM');
        $an  = $this->request->getPost ('AN');
        $data=$model->getHeure($date,$nom,$an)->getResult();
       
      echo view('heure', ["heure" => $data]);
}


public function excel()
{   $model = new Heure_model();
    $db = \Config\Database::connect();  
    $date = $this->request->getPost ('DATE');
    $nom  = $this->request->getPost ('NOM');
    $an  = $this->request->getPost ('AN');
    $data['heure']=$model->getHeure($date,$nom,$an)->getResult();
   
    return view('excelheure',$data);
}
}