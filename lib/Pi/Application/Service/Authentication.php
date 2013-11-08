<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 * @package         Service
 */

namespace Pi\Application\Service;

use Pi;
use Pi\Authentication\Strategy\AbstractStrategy;
use Zend\Authentication\Result as AuthenticationResult;

/**
 * Authentication service
 *
 * Usage with default adapter:
 *
 * ```
 *  Pi::service('authentication')->authenticate(<identity>, <credential>);
 *  if ($rememberMe) {
 *      Pi::service('session')->rememberMe();
 *  }
 * ```
 *
 * Usage with specified adapter via authenticate method:
 *
 * ```
 *  $adapter = new Adapter();
 *  Pi::service('authentication')->authenticate(<identity>,
 *      <credential>, $adapter);
 *  if ($rememberMe) {
 *      Pi::service('session')->rememberMe();
 *  }
 * ```
 *
 * Usage with specified adapter via separate methods:
 *
 * ```
 *  $adapter = new Adapter();
 *  Pi::service('authentication')->setAdapter($adapter);
 *  Pi::service('authentication')->authenticate(<identity>, <credential>);
 *  if ($rememberMe) {
 *      Pi::service('session')->rememberMe();
 *  }
 * ```
 *
 * @see Zend\Authentication\AuthenticationService
 * @author Taiwen Jiang <taiwenjiang@tsinghua.org.cn>
 */
class Authentication extends AbstractService
{
    /**
     * {@inheritDoc}
     */
    protected $fileIdentifier = 'authentication';

    /**
     * Authentication strategy
     *
     * @var AbstractStrategy
     */
    protected $strategy;

    /**
     * Set strategy
     *
     * @param AbstractStrategy|string   $strategy
     * @param array                     $options
     *
     * @return $this
     */
    public function setStrategy($strategy, array $options = array())
    {
        if (!$strategy instanceof AbstractStrategy) {
            if (false === strpos($strategy, '\\')) {
                $strategy = 'Pi\Authentication\Strategy\\' . ucfirst($strategy);
            }
            $strategy = new $strategy($options);
        }
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * Get strategy
     *
     * @return AbstractStrategy
     */
    public function getStrategy()
    {
        if (!$this->strategy) {
            $option = $this->getOption('strategy');
            if (is_string($option)) {
                $class = $option;
                $options = array();
            } else {
                $class = $option['class'];
                $options = isset($option['options'])
                    ? $option['options'] : array();
            }
            if (false === strpos($class, '\\')) {
                $class = 'Pi\Authentication\Strategy\\' . ucfirst($class);
            }
            $this->strategy = new $class($options);
        }

        return $this->strategy;
    }

    /**
     * Get URIs
     *
     * @param string $type  Type for URI: login, logout
     * @param array|string $params
     *
     * @return string
     */
    public function getUrl($type, $params = null)
    {
        return $this->getStrategy()->getUrl($type, $params);
    }

    /**
     * Load current session user and bind to user service
     *
     * @return bool
     */
    public function bind()
    {
        return $this->getStrategy()->bind();
    }

    /**
     * Check if an identity in current session
     *
     * Returns true if and only if an identity is available from storage
     *
     * @return bool
     */
    public function hasIdentity()
    {
        return $this->getStrategy()->hasIdentity();
    }

    /**
     * Returns the identity from storage or null if no identity is available
     *
     * @return mixed|null
     */
    public function getIdentity()
    {
        return $this->getStrategy()->getIdentity();
    }

    /**
     * Clears the identity from persistent storage
     *
     * @return bool
     */
    public function clearIdentity()
    {
        return $this->getStrategy()->clearIdentity();
    }

    /**
     * Authenticates against the supplied adapter
     *
     * @param string $identity
     * @param string $credential
     *
     * @return AuthenticationResult
     */
    public function authenticate($identity, $credential)
    {
        return $this->getStrategy()->authenticate($identity, $credential);
    }

    /**
     * Check if authenticated and go to authentication process if not
     *
     * @param array $params
     *
     * @return void
     */
    public function requireLogin(array $params = array())
    {
        return $this->getStrategy()->requireLogin($params);
    }

    /**
     * Go to login process
     *
     * @param array $params
     *
     * @return void
     */
    public function login(array $params = array())
    {
        return $this->getStrategy()->login($params);
    }

    /**
     * Go to logout process
     *
     * @param array $params
     *
     * @return void
     */
    public function logout(array $params = array())
    {
        return $this->getStrategy()->logout($params);
    }

    /**
     * Get user profile data from current session
     *
     * @param array $fields
     *
     * @return array
     */
    public function getData(array $fields = array())
    {
        return $this->getStrategy()->getData($fields);
    }
}
