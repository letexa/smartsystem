<?php defined('FRTCFTYU') or die('No direct script access.');
/*
 * Field model. 
 *
*/
class Model_Field extends Model  {
    
    protected $_table = 'field';
    public function __construct($dbname = null)
    {
        parent::__construct($this->_db);
    }
    
    public function insert_batch($data) {
        parent::insert_batch($data);
        
        $values = '';
        foreach($data as $item) {
            if ($values) {
                $values .= ",";
            }
            $values .= "('{$item['name']}', '{$item['value']}', {$item['user_id']})";
        }
        $query = "INSERT INTO {$this->_table} (name, value, user_id) VALUES {$values}";
        $this->query($query);
    }
}