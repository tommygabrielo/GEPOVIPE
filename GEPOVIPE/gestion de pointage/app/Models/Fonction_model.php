<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Fonction_model extends Model
{
   
    public function getFonction($para)
    {
       $db = \Config\Database::connect();
        $query=$db->query("SELECT * from fonction ");

        if($para != "" || $para != NULL)
        {  
            $query=$db->query("SELECT * from fonction WHERE 
             NOMFONCT  LIKE '%$para%' 
            OR CATFONCT LIKE '%$para%'
            ");
        } 
        return $query;
      }

    public function getFonct(){
    $db = \Config\Database::connect();
    $query=$db->query("SELECT * from fonction ");
    return $query;
    }
   

    public function saveFonction($NOMFONCT, $CATFONCT){
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO fonction (NOMFONCT, CATFONCT ) VALUES ( '$NOMFONCT', '$CATFONCT')");
       return $query;
      

    }


    public function updateFonction($id,$NOMFONCT, $CATFONCT)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE fonction SET NOMFONCT='$NOMFONCT', CATFONCT='$CATFONCT' where NUMFONCT='$id' ");
       
        return $query;
    }

    public function deleteFonction($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from fonction where NUMFONCT='$id'");
        $query=$db->query("DELETE from employe where NUMFONCT='$id'");
         return $query;
        
    } 

    public function getRecordCount() {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT count(id) as nb  from fonction ");
        return $query;
       
    }
}

