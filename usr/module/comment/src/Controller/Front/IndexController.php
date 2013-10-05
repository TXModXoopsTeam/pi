<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

namespace Module\Comment\Controller\Front;

use Pi;
use Pi\Mvc\Controller\ActionController;

class IndexController extends ActionController
{
    /**
     * Demo for article with comments
     */
    public function indexAction()
    {
        //$this->redirect('', array('controller' => 'demo'));
        $title = sprintf(__('Comment portal for %s'), Pi::config('sitename'));
        $links = array(
            'build'   => array(
                'title' => __('Build comment data for demo articles'),
                'url'   => $this->url('', array(
                    'controller'    => 'demo',
                    'action'        => 'build'
                )),
            ),
            'article'   => array(
                'title' => __('Demo article with comments'),
                'url'   => $this->url('', array(
                    'controller'    => 'demo'
                )),
            ),
            'module'   => array(
                'title' => __('Comment posts for module "Comment"'),
                'url'   => Pi::api('comment')->getUrl('module', array(
                    'name'  => 'comment',
                )),
            ),
            'category'   => array(
                'title' => __('Comment posts for module "Comment" with category "Article"'),
                'url'   => Pi::api('comment')->getUrl('module', array(
                    'name'      => 'comment',
                    'category'  => 'article',
                )),
            ),
            'user'   => array(
                'title' => sprintf(
                    __('Comment posts by user "%s"'),
                    Pi::service('user')->get(1, 'name')
                ),
                'url'   => Pi::api('comment')->getUrl('user', array(
                    'uid'   => 1,
                )),
            ),
        );
        $this->view()->assign(array(
            'title' => $title,
            'links' => $links,
        ));
        $this->view()->setTemplate('comment-index');
    }
}