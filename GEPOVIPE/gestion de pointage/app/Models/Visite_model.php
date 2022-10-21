<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Visite_model extends Model
{
   
// --------------------------------------affichage

    public function getVisite($para)
    {
       
        $db = \Config\Database::connect();
        
        
        $query=$db->query("SELECT * from visite INNER JOIN employe ON employe.NUMEMP=visite.NUMEMP inner join fonction on fonction.NUMFONCT=employe.NUMFONCT WHERE DATEV=(SELECT CURDATE())");
     
        if($para != "" || $para != NULL)
        {  
            $query=$db->query("SELECT * from visite INNER JOIN employe ON employe.NUMEMP=visite.NUMEMP inner join fonction on fonction.NUMFONCT=employe.NUMFONCT WHERE IDVISITE LIKE '%$para%' 
            
            OR NOMVISITEUR LIKE '%$para%' and DATEV=CURRENT_DATE
            OR CIN LIKE '%$para%' and DATEV=CURRENT_DATE
            OR DATEV LIKE '%$para%' and DATEV=CURRENT_DATE
            OR HEUREENTV LIKE '%$para%' and DATEV=CURRENT_DATE
            OR HEURESORTV LIKE '%$para%' and DATEV=CURRENT_DATE
            OR CATFONCT LIKE '%$para%' and DATEV=CURRENT_DATE
            OR NOMEMP LIKE '%$para%' and DATEV=CURRENT_DATE
            OR PRENOMEMP LIKE '%$para%' and DATEV=CURRENT_DATE
            OR OBSERVATION LIKE '%$para%' and DATEV=CURRENT_DATE
            ");
        } 
        
       return $query;
    }


    public function getEmploye($cat)
    {
        $db = \Config\Database::connect();
       $query=$db->query("SELECT * from employe a, fonction b WHERE a.NUMFONCT=b.NUMFONCT AND b.CATFONCT='$cat'  ");
        return $query;
    }

    public function getFonction()
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT DISTINCT CATFONCT from fonction");
        return $query;
    }
    

   
// -----------------------------sauvegarde
    public function saveVisite( $NOMVISITEUR, $NUMCIN, $DIRECTION, $OBSERVATION){
        $db = \Config\Database::connect();

        $query=$db->query("INSERT INTO visite (NOMVISITEUR,CIN,DATEV,HEUREENTV,NUMEMP,OBSERVATION) VALUES ('$NOMVISITEUR', '$NUMCIN',now() ,now(),'$DIRECTION','$OBSERVATION')");
        

       return $query;
    }



// -----------------------------update
public function updateVisite($id)
{
    $db = \Config\Database::connect();
  
     $query=$db->query("UPDATE visite SET HEURESORTV=(SELECT now()) WHERE IDVISITE='$id' ");

    return $query;
}  
}

