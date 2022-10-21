<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Employe_model extends Model
{
   
    public function getEmploye($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM employe
        INNER JOIN fonction  ON employe.NUMFONCT = fonction.NUMFONCT order by NUMEMP ASC");

        if($para != "" || $para != NULL)
        {  
            $query=$db->query("SELECT * FROM employe
            INNER JOIN fonction ON fonction.NUMFONCT = employe.NUMFONCT where
            fonction.NOMFONCT  LIKE '%$para%'
            OR employe.NUMEMP  LIKE '%$para%'
            OR employe.NOMEMP  LIKE '%$para%' 
            OR employe.PRENOMEMP LIKE '%$para%'
           
            order by NUMEMP ASC
            ");
        } 
        return $query;
      }

      public function getEmp()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * FROM employe
          INNER JOIN fonction  ON employe.NUMFONCT = fonction.NUMFONCT order by NUMEMP ASC");
          return $query;
      }
   
    public function getFonction()
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * from fonction ");
        return $query;
    }


    public function saveEmploye($NUMEMP,$NUMFONCT,$NOMEMP,$PRENOMEMP,$CONTACT)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO employe (NUMEMP, NUMFONCT, NOMEMP, PRENOMEMP, CONTACT ) VALUES ( '$NUMEMP','$NUMFONCT','$NOMEMP', '$PRENOMEMP','$CONTACT')");
        $query1=$db->query("INSERT INTO pointage (NUMEMP, NUMFONCT, DATEPOINTAGE) VALUES ( '$NUMEMP', '$NUMFONCT',NOW())");
        
      }

    
      public function updateEmploye($id,$NUMFONCT,$NOMEMP,$PRENOMEMP,$CONTACT)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE employe SET NUMFONCT='$NUMFONCT', NOMEMP='$NOMEMP', PRENOMEMP='$PRENOMEMP', CONTACT='$CONTACT' where NUMEMP='$id' ");
        $query1=$db->query("UPDATE pointage SET NUMFONCT='$NUMFONCT' where NUMEMP='$id' ");
       
    }

    public function deleteEmploye($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from employe where NUMEMP='$id'");
        $query1=$db->query("DELETE from pointage where NUMEMP='$id'");

    } 

  
}

