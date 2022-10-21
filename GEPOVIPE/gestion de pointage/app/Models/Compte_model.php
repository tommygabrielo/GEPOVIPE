<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Compte_model extends Model
{
   
   

      public function getCompte()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * FROM utilisateur order by NUMSEC ASC");
          return $query;
      }
   
        public function updateUt($id,$NOMSEC,$EMAIL,$MDP,$ROLE)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE utilisateur SET NOMSEC='$NOMSEC', EMAIL='$EMAIL', MDP='$MDP', ROLE='$ROLE' where NUMSEC='$id' ");
       
    }

    public function deleteCompte($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from utilisateur where NUMSEC='$id'");


    } 

  
}

