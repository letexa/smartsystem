<?php defined('FRTCFTYU') or die('No direct script access.');

/*
 * Login controller
 *
*/

class Controller_Login extends Controller {
    
    protected $_template = 'layouts/index';
    
    public function __construct() 
    {
        parent::__construct();
        $this->_config = Useracc::config('global');
    }
	
    /**
     * Index URL
     *
    */
    public function action_index() 
    {
        if (!empty($_COOKIE[$this->_config['cookie_name']])) {
            header('Location: /');
        }
        
        if ($_POST) {
            $model = Model::factory('User');
            $login = (string)Security::xss_clean($_POST['login']);
            $password = md5((string)Security::xss_clean($_POST['password']));
            $user = $model->where('login', '=', $login);
            if ($user->_data && $user->_data[0]['password'] == $password) {
                setcookie($this->_config['cookie_name'], openssl_encrypt($login, 'aes128', $this->_config['salt']));
                header('Location: /');
                exit;
            }
        } else {
            $this->_content['content'] = View::factory('login/main')
                                            ->execute();
        }
    }
    
}