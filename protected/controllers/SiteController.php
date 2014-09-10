<?php
/**
 * SiteController class
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   Web.controller
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */
/**
 * SiteController is the main site controller class
 *
 * @category  [APP]
 * @package   Web.controller
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */
class SiteController extends YController
{
    /**
     * Layout defaults
     * @var string
     */
    public $layout = '//layouts/column2_main';
    
    /**
     * Custom access rules
     * 
     * @return array rules map
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'roles' => array(YAuthManager::ROLE_ADMIN),
                'actions' => array('admin'),
            ),
            array(
                'allow',
                'users' => array('*'),
                'actions' => array('index', 'error'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     * 
     * @return void
     */
    public function actionIndex()
    {
        $this->layout = '//layouts/column2_main';
        $this->render('index');
    }
    
    /**
     * Renders admin UI home page
     * 
     * @return void
     */
    public function actionAdmin()
    {
        if (Yii::app()->user->getIsGuest()) {
            $this->layout = '//layouts/column2_main';
        }
        $this->render('admin');
    }

    /**
     * This is the action to handle external exceptions.
     * 
     * @return void
     */
    public function actionError()
    {
        $this->layout = '//layouts/main';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }
}