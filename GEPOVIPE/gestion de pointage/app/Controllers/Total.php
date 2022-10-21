<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Heure_model;

class Total extends Controller
{
    
    public function index()
    {
        $model = new Heure_model();
        $db = \Config\Database::connect();  
        $date = $this->request->getPost ('DATE');
        $data=$model->getHeur($date)->getResult();
        echo view('total', ["total" => $data]);
}


public function excel()
{   
    $model = new Heure_model();
    $db = \Config\Database::connect();  
    $date = $this->request->getPost ('DATE');
    $data['total']=$model->getHeur($date)->getResult();
    return view('exceltotal',$data);
}

}