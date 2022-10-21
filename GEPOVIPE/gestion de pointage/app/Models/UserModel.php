<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'utilisateur';
    protected $allowedFields = ['NOMSEC','ROLE','EMAIL','MDP','date'];
}