<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Heure_model extends Model
{
   

        public function getHeure($date,$nom,$an){
            $db = \Config\Database::connect();
            $query=$db->query("SELECT ((HEURESORTMA-HEUREENTMA)+(HEURESORTSO-HEUREENTSO)) as nbheure, a.NOMEMP as nom,a.NUMEMP AS NUM, a.PRENOMEMP as prenom, date_format(DATEPOINTAGE,'%d/%m/%Y') as datepointage, OBSERVATION1, c.NOMFONCT as fonction  from employe a INNER JOIN pointage b ON a.NUMEMP=b.NUMEMP INNER JOIN fonction c ON c.NUMFONCT=a.NUMFONCT AND c.NUMFONCT=b.NUMFONCT where b.NUMEMP='$nom' and month(DATEPOINTAGE)='$date' AND year(DATEPOINTAGE)='$an' AND (HEURESORTMA<>'00:00:00' OR HEURESORTSO<>'00:00:00')  GROUP BY DATEPOINTAGE having nbheure>0  ");
           
            return $query;
            }
            
        public function getHeur($date){
                $db = \Config\Database::connect();
                $query=$db->query("SELECT count(b.NUMEMP) as nbj, ((HEURESORTMA-HEUREENTMA)+(HEURESORTSO-HEUREENTSO)) as nbheure, a.NOMEMP as nom, a.NUMEMP AS NUM, a.PRENOMEMP as prenom, date_format(DATEPOINTAGE,'%d/%m/%Y') as datepointage, OBSERVATION1, c.NOMFONCT as fonction  from employe a INNER JOIN pointage b ON a.NUMEMP=b.NUMEMP INNER JOIN fonction c ON c.NUMFONCT=a.NUMFONCT AND c.NUMFONCT=b.NUMFONCT where month(DATEPOINTAGE)='$date' AND (HEURESORTMA<>'00:00:00' OR HEURESORTSO<>'00:00:00') GROUP BY NUM having nbheure>0 ");
                return $query;
                }
        
}