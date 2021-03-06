<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

namespace Module\System\Controller\Front;

use Pi;
use Pi\Mvc\Controller\ActionController;

/**
 * Page jump
 */
class JumpController extends ActionController
{
    /**
     * Transition page jump
     */
    public function indexAction()
    {
        $this->view()->setTemplate('jump')->setLayout('layout-simple');
        $params = Pi::service('cookie')->get('PI_JUMP', true, true);
        if (empty($params['time'])) {
            $params['time'] = 3;
        }
        if ($this->url('', array('action' => 'index')) == $params['url']) {
            $params['url'] = '';
        }
        if (empty($params['url'])) {
            $params['url'] = $this->url('home');
        }
        $this->view()->assign($params);
    }
}
