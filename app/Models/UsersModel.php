<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsersModel extends Model{
    protected $table = "user";
    protected $allowedFields = ["username","firstname","middlename","lastname","birthday","contactnumber","photo"];
}