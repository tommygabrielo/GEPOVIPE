<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Pointage_model extends Model
{
    
    public function getPointage($para)
    {
        
        $db = \Config\Database::connect();
        
        
        $query=$db->query("SELECT * FROM pointage
        
        INNER JOIN employe ON employe.NUMEMP=pointage.NUMEMP  AND employe.NUMFONCT=pointage.NUMFONCT INNER JOIN fonction ON fonction.NUMFONCT=pointage.NUMFONCT AND fonction.NUMFONCT=pointage.NUMFONCT  WHERE pointage.DATEPOINTAGE=(SELECT curdate())  ORDER BY employe.NUMEMP asc ");
        if($para != "" || $para != NULL)
        {  
            $query=$db->query("SELECT * FROM pointage
            INNER JOIN employe ON employe.NUMEMP=pointage.NUMEMP  AND employe.NUMFONCT=pointage.NUMFONCT INNER JOIN fonction ON fonction.NUMFONCT=pointage.NUMFONCT AND fonction.NUMFONCT=pointage.NUMFONCT   where 
            pointage.NUMEMP  LIKE '%$para%'and pointage.DATEPOINTAGE=CURRENT_DATE
            OR fonction.NOMFONCT LIKE '%$para%'and pointage.DATEPOINTAGE=CURRENT_DATE
            OR employe.NOMEMP  LIKE '%$para%' and pointage.DATEPOINTAGE=CURRENT_DATE
            OR employe.PRENOMEMP LIKE '%$para%' and pointage.DATEPOINTAGE=CURRENT_DATE 
            ORDER BY pointage.NUMEMP asc 
            
            ");
            
        } 
        
        return $query;
        
        
    }
    
    public function nbrePointage(){
        $db = \Config\Database::connect();
        
        $query=$db->query("SELECT count(*) as nb FROM pointage WHERE DATEPOINTAGE = CURRENT_DATE");
        return $query;
    }

    public function savePointage(){
        $db = \Config\Database::connect();
        
        $query=$db->query("INSERT INTO pointage (NUMEMP, NUMFONCT, DATEPOINTAGE )  (SELECT NUMEMP, NUMFONCT, NOW() FROM employe)");
        return $query;
        
        
    }
    
    public function deconnect(){
        $db = \Config\Database::connect();
        
        $query=$db->query("SELECT count(*) AS NB from pointage where ((HEUREENTMA<>'00:00:00' AND HEURESORTMA ='00:00:00') OR (HEUREENTSO<>'00:00:00' AND HEURESORTSO='00:00:00')) AND DATEPOINTAGE=CURRENT_DATE");
        return $query;
    }
    
    
    public function updatePointage($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEUREENTMA=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        
        return $query;
    }
    
    public function updatePointage1($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEURESORTMA=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        
        return $query;
    }
    
    public function updatePointage2($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEUREENTSO=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        
        return $query;
    }
    
    public function updatePointage3($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEURESORTSO=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        
        return $query;
    }
    
    public function updatePointage4($id,$OBS)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET OBSERVATION1='$OBS' where IDPOINTAGE='$id' ");
        
        return $query;
    }
    
}

