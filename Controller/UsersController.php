<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class UsersController extends AppController {

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

	public function index($value='')
	{
		# code...
	}

    public function add(){
    	if($this->request->is('post')){
    		$this->User->create();
    		var_dump($this->request->data);
    		if($this->User->save($this->request->data)){
    			$this->Session->setFlash(__('The user has been saved'), 'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
    			return $this->redirect(array('controller' => 'pages', 'action' => 'display'));
    		}
			$this->Session->setFlash(__('The User could not be saved. Plz try again'), 'alert', array(
				'plugin' => 'BoostCake',
				'class' => 'alert-warning'
			));
    	}

    }
 
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        }
	        $this->Session->setFlash(__('Invalid username or password, try again'), 'alert', array(
				'plugin' => 'BoostCake',
				'class' => 'alert-warning'
			));
	    }
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}



}
