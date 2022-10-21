<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Pointage_model;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
 
    public function auth()
    {
        helper(['form']);
        $session = session();
        $model = new UserModel();
        $name = $this->request->getVar('name');
        $password = $this->request->getVar('password');
        $data = $model->where('NOMSEC', $name)->first();
        if($data){
            $pass = $data['MDP'];
            
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'NUMSEC'      => $data['NUMSEC'],
                    'NOMSEC'     => $data['NOMSEC'],
                    'EMAIL'      => $data['EMAIL'],
                    'ROLE'       => $data['ROLE'],
                    
                   'logged_in'     => TRUE
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

                return redirect()->to('/home');
            }else{
                $session->setFlashdata('msg', 'Mot de passe incorrect');                
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Nom introuvable');
            return redirect()->to('/login');
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

