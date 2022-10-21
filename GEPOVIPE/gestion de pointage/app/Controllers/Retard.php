<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Retard_model;


class Retard extends BaseController
{
	public function index()
	{
		$model = new Retard_model();
        $db = \Config\Database::connect();
        $data['retard']  = $model->getRetard()->getResult();
		$data['ret']  = $model->getRet()->getResult();
       
        echo view('retard',$data);
	}

	//--------------------------------------------------------------------

}
