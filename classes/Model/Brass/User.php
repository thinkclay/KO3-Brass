<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Brass User Model
 */
class Model_Brass_User extends Model_Authenticate_User_Brass implements Acl_Role_Interface
{
    public $_fields = [
        'id' => [
            'type' => 'string'
        ],

        'devmode' => [
            'type'  => 'bool'
        ],

        'role' => [
            'editable'  => 'admin',
            'input'     => 'select',
            'label'     => 'Role',
            'populate'  => 'Model_Annex_Form::role_list',
            'required'  => TRUE,
            'type'      => 'string',
        ],
        'created' => [
            'editable'  => FALSE,
            'type'      => 'string',
            'required'  => TRUE,
        ],
        'updated' => [
            'editable'  => FALSE,
            'type'      => 'string'
        ],
        'last_login' => [
            'editable'  => FALSE,
            'type'      => 'int',
        ],
        'updated_time' => [
            'editable' => FALSE,
            'type'     => 'string',
        ],
        'login_count' => [
            'editable'   => FALSE,
            'type'       => 'int',
        ],
        'token' => [
            'editable'   => FALSE,
            'type'       => 'string',
        ],
        'username' => [
            'editable'   => 'user',
            'label'      => 'User Name',
            'type'       => 'string',
            'required'   => TRUE,
            'min_length' => 4,
            'max_length' => 32,
            'unique'     => TRUE,
        ],
        'password' => [
            'editable'   => FALSE,
            'label'      => 'Password',
            'type'       => 'string',
            'required'   => TRUE,
            'min_length' => 5,
            'max_length' => 50
        ],
        'email' => [
            'editable'   => 'user',
            'label'      => 'Email Address',
            'type'       => 'string',
            'required'   => TRUE,
            'min_length' => 4,
            'max_length' => 32,
            'unique'     => TRUE,
            'rules' => [
                ['email'],
                ['email_domain'],
            ]
        ],
        'phone1' => [
            'type' => 'string',
        ],
        'phone2' => [
            'type' => 'string',
        ],
        'address1' => [
            'type' => 'string',
        ],
        'address2' => [
            'type' => 'string',
        ],
        'city' => [
            'type' => 'string',
        ],
        'state' => [
            'type' => 'string',
        ],
        'postal_code' => [
            'type' => 'string',
        ],
        'country' => [
            'type' => 'string',
        ],

        'first_name' => [
            'editable'   => 'user',
            'label'      => 'First Name',
            'type'       => 'string',
            'max_length' => 32,
            'rules'      => [
                ['alpha_dash']
            ]
        ],
        'middle_name' => [
            'editable'   => 'user',
            'label'      => 'Middle Name',
            'type'       => 'string',
            'max_length' => 32,
            'rules'      => [
                ['alpha_dash']
            ]
        ],
        'last_name' => [
            'editable'   => 'user',
            'label'      => 'Last Name',
            'type'       => 'string',
            'max_length' => 32,
            'rules'      => [
                ['alpha_dash']
            ]
        ],
    ];

    public function get_role_id()
    {
        return $this->role;
    }

    public static function unique_username($username)
    {
        return is_null(BrassDB::instance()->find_one('brass_users', ['username', $username]));
    }

    public static function unique_email($email)
    {
        return is_null(BrassDB::instance()->find_one('brass_users', ['email', $email]));
    }
}