<?php
/**
 * Guest menu items configuration
 *
 * PHP version 5
 *
 * @category  JVIBA BLOG
 * @package   Web.config
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @copyright 2012 JVIBA
 * @license   http://jviba.com/display/license proprietary
 * @link      http://jviba.com/display/PhpDoc
 */

$route = Yii::app()->controller->route;

$ret = array(
    /*array(
        'label' => Yii::t('menu', 'About Blog'),
        'url' => array('/page/about'),
    ),*/
    array(
        'label' => Yii::t('menu', 'All Posts'),
        'url' => array('/articles/article/index'),
        'active' => $route == 'article/index' && !isset($_REQUEST['category']),
    ),
);

$language = Yii::app()->language;
$categories = YArticleCategory::getList(true, YLanguage::model()->findByName($language)->id);
foreach ($categories as $category) {
    $ret[] = array(
        'label' => ucfirst($category['label']),
        'url' => array('/articles/article/index', 'categories' => $category['name']),
    );
}

return $ret;