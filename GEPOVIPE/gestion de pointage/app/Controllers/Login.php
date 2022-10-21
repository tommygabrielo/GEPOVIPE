<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\Pointage_model;

class Login extends Controller
{
    private $login = '' ;
    public function __construct(){
      
        $this->login = new UserModel();       
    }
    
    // show login form
    public function index()    {  
        $session = session();  
        $session->setFlashdata('msg', '');
    return view('login');
    }      
    //check user is exist or not
    
    
    public function auth(){

        $session = session();  
        $data = array('NOMSEC'=>$this->request->getVar('name'),
        'MDP'=>$this->request->getVar('password'));

        $user =  $this->login->where($data); 
        $rows = $this->login->countAllResults();
        $model = new UserModel();
        $name = $this->request->getVar('name');
        $dat = $model->where('NOMSEC', $name)->first();
                
        if($rows==1){
            $ses_data = [
                'NOMSEC'     => $dat['NOMSEC'],
                'ROLE'       => $dat['ROLE'],
                'NUMSEC'     => $dat['NUMSEC'],
                'ROLE'       => $dat['ROLE'],
            ];
            $session->set($ses_data);


            $model = new Pointage_model();
            $db = \Config\Database::connect();
            
            $db=$model->nbrePointage();
            foreach($db->getResult() as $row){
                if($row->nb==0){
                    $model->savePointage();
                }        
          }
            return view('home');
        }
    else{
            $session->setFlashdata('msg', 'Utilsateur inconnu ou mot de passe incorrect' );
            return view('login');
        }

    }
    


     public function logout()
    {
        $session = session();
        $model = new Pointage_model();
        $db = \Config\Database::connect();
        
        $db=$model->deconnect();
        foreach($db->getResult() as $row){
            if($row->NB!=0){
                return redirect()->to('/pointage');
            } else{
                $session->destroy();
                return redirect()->to('/login');
            }       
      }
    }
       
}
