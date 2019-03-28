<?php defined('FRTCFTYU') or die('No direct script access.');

/*
 * Default controller
 *
*/

class Controller_Index extends Controller {
    
    protected $_template = 'layouts/index';
    
    private $user;
    
    private $fields;
    
    public function __construct() 
    {
        parent::__construct();
        $this->_config = Useracc::config('global');
        
        $model = Model::factory('User');
        if (!empty($_COOKIE[$this->_config['cookie_name']])) {
            $login = openssl_decrypt($_COOKIE[$this->_config['cookie_name']], 'aes128', $this->_config['salt']);
            $this->user = $model->where('login', '=', $login)->current();
            $field = Model::factory('Field');
            $this->fields = $field->where('user_id', '=', $this->user->_data['id']);
        }
    }
	
    /**
     * Index URL
     *
    */
    public function action_index() 
    {
        if ($this->user) {
            $this->_content['content'] = View::factory('index/main')
                                            ->set('user', $this->user->_data)
                                            ->set('fields', $this->fields->_data)
                                            ->execute();
        } else {
            header('Location: /login');
            exit;
        }
    }
    
    /**
     * Edit URL
     *
    */
    public function action_edit()
    {
        $errors = [];
        if ($_POST) {
            foreach($_POST as $key => $val) {
                if(empty($val)) {
                    $errors[] = $key;
                }
            }
            
            if (empty($errors)) {
                $data = [
                    'id' => $this->user->_data['id'],
                    'name' => (string) Security::xss_clean($_POST['name']),
                    'lastname' => (string) Security::xss_clean($_POST['lastname']),
                    'patronymic' => (string) Security::xss_clean($_POST['patronymic']),
                    'date' => (string) Security::xss_clean($_POST['date'])
                ];

                $this->user->_data = $data;
                $this->user->update();
                
                $model = Model::factory('Field');
                $model->delete('user_id', $this->user->_data['id']);
                
                if (!empty($_POST['field'])) {
                    $data = [];
                    foreach($_POST['field'] as $item) {
                        $item['user_id'] = $this->user->_data['id'];
                        $data[] = $item;
                    }
                    if ($data) {
                        $model->insert_batch($data);
                    }
                }
                
                header('Location: /');
                exit;
            }
        }
        
        if ($this->user) {
            $this->_content['content'] = View::factory('index/edit')
                                            ->set('user', $_POST ?: $this->user->_data)
                                            ->set('errors', $errors)
                                            ->set('fields', $this->fields->_data)
                                            ->execute();
        } else {
            header('Location: /login');
            exit;
        }
    }
    
}