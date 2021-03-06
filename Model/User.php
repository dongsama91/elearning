<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            ),
            'isUnique' => array(
              'rule' => 'isUnique',
              'message' => 'This Username has already been used.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
            'lenght' => array(
                'rule'    => array('minLength', '8'),
                'message' => 'Minimum 8 characters long'
            ),
                        
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('student', 'teacher','manager')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
    public $hasOne = array( 
            'Lecturer' => array(
            'className' => 'Lecturer',
            'foreignKey' => 'id'
            )
        );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}
