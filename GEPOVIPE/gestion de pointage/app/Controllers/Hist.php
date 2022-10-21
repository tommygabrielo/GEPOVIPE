<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Retard_model;

class Hist extends Controller
{   

     
        public function index() {
            $model = new Retard_model();
            $db = \Config\Database::connect();
            $da=$db=$model->getRetar()->getResult();
           $data['chart_data'] = json_encode($da);
             
          return view('histogramme',$data);
        }
     
    }