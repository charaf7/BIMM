<?php
/**
 * Created by PhpStorm.
 * User: charaf-eddine
 */

require_once("Axe.php");

interface BimmStorage {
    public function users();
    public function createUser(User $user);
    //public function userAxes($username);
    public function userAxe1($email);
    public function userAxe2($email);
    public function userAxe3($email);
    public function userAxe4($email);
    public function userAxe5($email);
    public function userAxe6($email);
    //public function read($id);
    public function update($id,array $values);
    public function readAccount($email);
    public function updateAccount(User $user);

}
?>