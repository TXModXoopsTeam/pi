<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

/**
 * User profile and resource specs
 *
 * @see Pi\Application\Installer\Resource\User
 * @author Taiwen Jiang <taiwenjiang@tsinghua.org.cn>
 */
return array(
    // Fields
    'field'     => array(

        // Account fields

        // Account: identity
        'identity'      => array(
            'type'      => 'account',
            'name'      => 'identity',
            'title'     => __('Username'),
            // Edit element specs
            'edit'      => array(
                'validators'    => array(
                    array(
                        'name'      => 'Module\User\Validator\Username',
                    ),
                ),
            ),
            // Is editable by admin, default as true
            'is_edit'   => false,
        ),
        // Account: password
        'credential'    => array(
            'type'      => 'account',
            'name'      => 'credential',
            'title'     => __('Password'),
            'edit'      => array(
                'element'       => 'password',
                'validators'    => array(
                    array(
                        'name'      => 'Module\User\Validator\Password',
                    ),
                ),
            ),
            'is_display'    => false,
            'is_search'     => false,
        ),
        // Account: email
        'email'     => array(
            'type'      => 'account',
            'name'      => 'email',
            'title'     => __('Email'),
            'edit'      => array(
                'element'       => 'email',
                'validators'    => array(
                    array(
                        'name'      => 'EmailAddress',
                        'options'   => array(
                            'useMxCheck'        => false,
                            'useDeepMxCheck'    => false,
                            'useDomainCheck'    => false,
                        ),
                    ),
                    array(
                        'name'      => 'Module\User\Validator\UserEmail',
                    ),
                ),
            ),
        ),
        // Account: display name
        'name'      => array(
            'type'      => 'account',
            'name'      => 'name',
            'title'     => __('Display name'),
            // Edit element specs
            'edit'      => array(
                'validators'    => array(
                    array(
                        'name'      => 'Module\User\Validator\Name',
                    ),
                ),
            ),
        ),
        // Account: gender
        'gender'    => array(
            'type'      => 'account',
            'name'      => 'gender',
            'title'     => __('Gender'),
            'edit'      => 'Module\User\Form\Element\Gender',
            'filter'    => 'Gender',
        ),
        // Account: birth date
        'birthdate'  => array(
            'type'  => 'account',
            'name'  => 'birthdate',
            'title' => __('Birthdate'),
            'edit'  => array(
                'element'       => 'date_select',
                'options'       => array(
                    'year_attributes' => array(
                        'class' => 'input-small',
                    ),
                    'month_attributes' => array(
                        'class' => 'input-small',
                    ),
                    'day_attributes' => array(
                        'class' => 'input-small',
                    ),
                ),
            ),
        ),
        // Account: avatar
        'avatar'    => array(
            'type'      => 'account',
            'name'      => 'avatar',
            'title'     => __('Avatar'),

            'is_edit'       => false,
            'is_display'    => false,
            'is_search'     => false,
        ),

        // Account: Collective status
        'active'    => array(
            'type'      => 'account',
            'name'      => 'active',
            'title'     => __('Active'),
            'edit'      => 'text',
            'filter'    => 'YesNo',

            'is_edit'       => false,
            'is_display'    => false,
        ),
        // Account: Register time
        'time_created'  => array(
            'type'      => 'account',
            'name'      => 'time_created',
            'title'     => __('Register time'),
            'edit'      => 'text',
            'filter'    => array('Int', 'DateTimeFormatter'),

            'is_edit'       => false,
            'is_display'    => false,
        ),
        // Account: Activation time
        'time_activated'    => array(
            'type'      => 'account',
            'name'      => 'time_activated',
            'title'     => __('Activation time'),
            'edit'      => 'text',
            'filter'    => 'DateTimeFormatter',

            'is_edit'       => false,
            'is_display'    => false,
        ),
        // Account: Disabled time
        'time_disabled' => array(
            'type'      => 'account',
            'name'      => 'time_disabled',
            'title'     => __('Disabled time'),
            'edit'      => 'text',
            'filter'    => 'DateTimeFormatter',

            'is_edit'       => false,
            'is_display'    => false,
            'is_search'     => false,
        ),
        // Account: Deleted time
        'time_deleted'  => array(
            'type'      => 'account',
            'name'      => 'time_deleted',
            'title'     => __('Deleted time'),
            'edit'      => 'text',
            'filter'    => 'DateTimeFormatter',

            'is_edit'       => false,
            'is_display'    => false,
            'is_search'     => false,
        ),

        // Profile fields

        // Profile: Level
        'level'    => array(
            'name'      => 'level',
            'title'     => __('Level'),

            'is_display'    => false,
            'is_edit'       => false,
            'is_search'     => true,
        ),
        // Profile: homepage
        'homepage'  => array(
            'name'  => 'homepage',
            'title' => __('Homepage'),
        ),
        // Profile: bio
        'bio'  => array(
            'name'  => 'bio',
            'title' => __('Short bio'),
            'edit'  => 'textarea',
        ),
        // Profile: signature
        'signature'  => array(
            'name'  => 'signature',
            'title' => __('Signature'),
            'edit'  => 'textarea',
        ),

        // Profile: Register IP
        'ip_register'  => array(
            'name'      => 'ip_register',
            'title'     => __('Register IP'),

            'is_edit'       => false,
            'is_display'    => false,
            'is_search'     => false,
        ),

        // Compound fields
        // Compound: Social networking tools
        'tool'      => array(
            'name'  => 'tool',
            'title' => __('Social tools'),

            'field' => array(
                'title'         => array(
                    'title' => __('Tool name'),
                ),
                'identifier'    => array(
                    'title' => __('ID or URL'),
                ),
            ),
        ),

    ),

    // Timeline logs from modules
    'timeline'  => array(
        'operation' => array(
            'title' => __('User action'),
            'icon'  => 'icon-user',
        ),
    ),

    // Activity logs
    'activity'  => array(
    ),

    // Quicklinks
    'quicklink' => array(
        'logout'    => array(
            'title' => __('Logout'),
            'link'  => Pi::service('authentication')->getUrl('logout'),
            'icon'  => 'icon-off',
        ),
    ),
);
