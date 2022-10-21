<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Employe_model;

class PdfEmploye extends Controller
{   public $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index() 
	{   
        
       return view('pdfemploye');
        
    }

    function htmlToPDF(){
        
        $model = new Employe_model();
        $dompdf = new \Dompdf\Dompdf();
      
        $data=$db=$model->getEmp()->getResult();
        $dompdf->loadHtml(view('pdfemploye',  ["employe" => $data]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdfemploye'));
    }

}