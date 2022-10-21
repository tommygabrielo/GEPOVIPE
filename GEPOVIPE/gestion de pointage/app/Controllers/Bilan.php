<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Bilan_visite_model;

class Bilan extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Bilan_visite_model();
        $db = \Config\Database::connect();  
        $date1      = $this->request->getpost ('DATE1');
        $date2      = $this->request->getpost ('DATE2');
        $data['bilan']=$model->getBilan($date1,$date2)->getResult();
        echo view('bilan',$data);      
    }

    public function excel()
    {
        $model = new Bilan_visite_model();
        $db = \Config\Database::connect();  
        $date1      = $this->request->getpost ('DATE1');
        $date2      = $this->request->getpost ('DATE2');
        $data['excel']=$model->getExcel($date1,$date2)->getResult();
        echo view ('excel',$data);
    }

    

   

}

 