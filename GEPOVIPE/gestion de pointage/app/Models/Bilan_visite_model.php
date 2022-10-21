<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Bilan_visite_model extends Model
{
   

public function getBilan($date1,$date2)
    {
       
        $db = \Config\Database::connect();
        
       $query=$db->query("SELECT count(IDVISITE) as nombre, NOMVISITEUR, CATFONCT, OBSERVATION,NOMEMP, PRENOMEMP, date_format(DATEV,'%d/%m/%Y') AS DATEV from visite INNER JOIN employe ON employe.NUMEMP=visite.NUMEMP inner join fonction ON fonction.NUMFONCT=employe.NUMFONCT WHERE DATEV BETWEEN '$date1' AND '$date2'  GROUP BY DATEV, IDVISITE");
          return $query;
             
    }


    public function getExcel($date1,$date2)
    {
       
        $db = \Config\Database::connect();
        
        $query=$db->query("SELECT count(IDVISITE) as nombre, NOMVISITEUR, CATFONCT, OBSERVATION,NOMEMP, PRENOMEMP, date_format(DATEV,'%d/%m/%Y') AS DATEV from visite INNER JOIN employe ON employe.NUMEMP=visite.NUMEMP inner join fonction ON fonction.NUMFONCT=employe.NUMFONCT WHERE DATEV BETWEEN '$date1' AND '$date2'  GROUP BY DATEV, IDVISITE");
          return $query;
             
    }
   
   
}

