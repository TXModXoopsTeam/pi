<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

namespace Module\System;

use Pi;

/**
 * System Event Handler
 *
 * @author Taiwen Jiang <taiwenjiang@tsinghua.org.cn>
 */
class Event
{
    /**
     * Module installation
     *
     * @param string $data
     * @param string $module
     */
    public static function moduleinstall($data, $module)
    {
        $model = Pi::model('update', $module);
        $data = array(
            'title'     => sprintf(__('Module %s installed'), $data),
            'content'   => sprintf(__('The module %s is installed successfully.'), $data),
            'uri'       => Pi::url('www', true),
            'time'      => time(),
        );
        $model->insert($data);
    }

    /**
     * Module uninstallation
     *
     * @param string $data
     * @param string $module
     */
    public static function moduleuninstall($data, $module)
    {
        $model = Pi::model('update', $module);
        $data = array(
            'title'     => sprintf(__('Module %s uninstalled'), $data),
            'content'   => sprintf(__('The module %s is uninstalled successfully.'), $data),
            'uri'       => Pi::url('www', true),
            'time'      => time(),
        );
        $model->insert($data);
    }

    /**
     * Module update
     *
     * @param string $data
     * @param string $module
     */
    public static function moduleupdate($data, $module)
    {
        $model = Pi::model('update', $module);
        $data = array(
            'title'     => sprintf(__('Module %s updated'), $data),
            'content'   => sprintf(__('The module %s is updated successfully.'), $data),
            'uri'       => Pi::url('www', true),
            'time'      => time(),
        );
        $model->insert($data);
    }

    /**
     * Module activation
     *
     * @param string $data
     * @param string $module
     */
    public static function moduleactivate($data, $module)
    {
        $model = Pi::model('update', $module);
        $data = array(
            'title'     => sprintf(__('Module %s activated'), $data),
            'content'   => sprintf(__('The module %s is activated successfully.'), $data),
            'uri'       => Pi::url('www', true),
            'time'      => time(),
        );
        $model->insert($data);
    }

    /**
     * Module deactivation
     *
     * @param string $data
     * @param string $module
     */
    public static function moduledeactivate($data, $module)
    {
        $model = Pi::model('update', $module);
        $data = array(
            'title'     => sprintf(__('Module %s deactivated'), $data),
            'content'   => sprintf(__('The module %s is deactivated successfully.'), $data),
            'uri'       => Pi::url('www', true),
            'time'      => time(),
        );
        $model->insert($data);
    }
}
