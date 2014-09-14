<?php
/**
 * YArticleCategory class file
 *
 * PHP version 5
 *
 * @category   YII-CMS
 * @package    Module.articles
 * @subpackage Module.articles.model
 * @author     Alexander Vinogradov <winogradow@jviba.com>
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link       https://jviba.com/display/PhpDoc/yii-cms
 */
/**
 * YArticleCategory is the model class for table "article_category".
 * The followings are the available columns in table 'article_category':
 *
 * @property string  $id
 * @property string  $name
 * @property string  $label
 * @property integer $index
 * @property integer $parent_id
 * @property integer $level
 * @property integer $is_leaf
 *
 * @category   YII-CMS
 * @package    Module.articles
 * @subpackage Module.articles.model
 * @author     Alexander Vinogradov <winogradow@jviba.com>
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link       https://jviba.com/display/PhpDoc/yii-cms
 */
class ArticleCategory extends YArticleCategory implements IHasSiteMap
{
    const SITE_MAP_PRIORITY = '0.8';
    
    
    
     /**
     * Returns location of entity.
     * 
     * @return string Location
     * 
     * @abstract
     */
    public function getLocation()
    {
        return Yii::app()->createAbsoluteUrl('/articles/article/index', array('categories' => $this->id, 'lang' => 'ru'));
        
    }
    
    /**
     * Returns a time of an entity last modified.
     * 
     * @return timestamp 
     */
    public function getLastModified()
    {
        return date('Y-m-d', strtotime(empty($this->object->update_time) ? $this->object->create_time: $this->object->update_time));
    }
    
    /**
     * Returns change frequency of an entity.
     * 
     * @return string Change frequency
     */
    public function getChangeFrequency()
    {
        return self::CHANGE_FREQUENCY_WEEKLY;
    }
    
    /**
     * Returns priority of an entity.
     * 
     * @return string Priority
     */
    public function getSiteMapPriority()
    {
        return self::SITE_MAP_PRIORITY;
    }
    
        /**
     * Returns tags of article
     * 
     * @param array $tagsObjectId array of object ids
     * 
     * @return array of tags, which have structure array['label', 'name', 'object_id']
     */
    public function getTagsList($tagsObjectId = null)
    {
        $tagsList = array();
        $list = self::getList();
        foreach ($list as $element) {
            $tagsList[] = array(
                'name' => ''.$element['name'],
                'label' => $element['label'],
                'object_id' => $element['object_id'],
            );
        }
        if (!is_null($tagsObjectId)) {
            foreach ( $tagsList  as $tagList) {  
                if ($tagList['object_id'] == $tagsObjectId) {
                    $tagsListByObjectId [] = $tagList;
                }
            }
            return $tagsListByObjectId;
        }
        return $tagsList;
    }
    
    
}