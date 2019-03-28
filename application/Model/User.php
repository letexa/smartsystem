<?php defined('FRTCFTYU') or die('No direct script access.');
/*
 * User model. 
 *
*/
class Model_User extends Model  {
    
    protected $_table = 'user';
    public function __construct($dbname = null)
    {
        parent::__construct($this->_db);
    }
}