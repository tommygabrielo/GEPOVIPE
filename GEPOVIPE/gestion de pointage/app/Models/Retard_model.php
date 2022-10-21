<?php namespace App\Models;


use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Retard_model extends Model
{
    public function getRetard()
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT count(IDPOINTAGE) as nombre, c.NOMFONCT AS nomfonct , a.NUMEMP, a.NOMEMP,a.PRENOMEMP, DATEPOINTAGE AS y FROM employe a  INNER JOIN pointage b  ON  a.NUMEMP=b.NUMEMP INNER JOIN fonction c  ON  c.NUMFONCT=b.NUMFONCT where HEUREENTMA>'08:15:00' or HEUREENTSO>'14:15:00' AND DATEPOINTAGE=CURDATE() GROUP BY b.NUMEMP ");
       
        return $query;
       
    }
    public function getRetar()
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT count(IDPOINTAGE) as nombre, c.NOMFONCT AS nomfonct , a.NUMEMP, a.NOMEMP,a.PRENOMEMP, DATEPOINTAGE AS y FROM employe a  INNER JOIN pointage b  ON  a.NUMEMP=b.NUMEMP INNER JOIN fonction c  ON  c.NUMFONCT=b.NUMFONCT where HEUREENTMA>'08:15:00' or HEUREENTSO>'14:15:00' GROUP BY y ");
       
        return $query;
       
    }
    public function getRet()
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT count(IDPOINTAGE) as nomb, date_format(CURDATE(),'%d/%m/%Y') as jour 
         FROM employe a INNER JOIN pointage b ON a.NUMEMP=b.NUMEMP where (HEUREENTMA>'08:15:00' or HEUREENTSO>'14:15:00')AND DATEPOINTAGE = CURRENT_DATE ");
        return $query;
        
    }
    public function getRe()
    {
        $db = \Config\Database::connect();
       
        $query=$db->query("SELECT count(NUMEMP) AS a, DATEPOINTAGE AS y FROM pointage group by DATEPOINTAGE");
        return $query;
        
    }
}