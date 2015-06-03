<?php
$config = array(
   'users' => array(
        array(
             'field'   => 'username',
             'label'   => 'Username',
             'rules'   => 'trim|required|alpha_dash|min_length[3]|max_length[40]|is_unique[users.email]|xss_clean'
            ),
        array(
             'field'   => 'password',
             'label'   => 'Contraseña',
             'rules'   => 'trim|required|alpha_dash|min_length[8]|max_length[40]|matches[confirm_password]|xss_clean'
            ),
        array(
             'field'   => 'email',
             'label'   => 'Email',
             'rules'   => 'trim|required|valid_email|is_unique[users.email]|xss_clean'
            ),
        array(
             'field'   => 'group',
             'label'   => 'Grupo',
             'rules'   => 'trim|required|min_length[5]|max_length[8]|xss_clean'
            )
    )
);