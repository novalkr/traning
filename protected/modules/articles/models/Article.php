<?php
/**
 * Article class file
 *
 * PHP version 5
 *
 * @category   JVIBA BLOG
 * @package    Module.articles
 * @subpackage Module.articles.model
 * @author     Kristina Babich <kristina@jviba.com>
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link       https://jviba.com/display/PhpDoc/yii-cms
 */
/**
 * Article is the model class for table "article".
 * The followings are the available columns in table 'article':
 *
 * @property string    $id
 * @property string    $object_id
 * @property string    $author_id
 * @property string    $revision_counter
 * @property string    $name
 * @property timestamp $first_publish_date
 * 
 * @category   JVIBA BLOG
 * @package    Module.articles
 * @subpackage Module.articles.model
 * @author     Kristina Babich <kristina@jviba.com>
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link       https://jviba.com/display/PhpDoc/yii-cms
 */
class Article extends YArticle implements IHasSefUrl, IHasSiteMap
{
    /**
     * Returns the static model of the specified AR class.
     *
     * @param string $className the name of the model class
     *
     * @return CActiveRecord|YArticle the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Returns cached articles list
     *
     * @return array articles
     *
     * @static
     */
    public static function getList()
    {
        $dependency = new CDbCacheDependency();
        $tableName = self::model()->tableName();
        $dependency->sql = "SELECT COUNT(id) FROM " . $tableName . ';';
        $options = array(
            CacheUtils::TABLE_CACHE_OPTION_DEPENDENCY => $dependency,
        );
        return CacheUtils::table($tableName, null, $options);
    }

    /**
     * Return article id by name
     *
     * @param string $name Name of article
     *
     * @return mixed int\bool return article id, if article name not found return false
     *
     * @static
     */
    public static function getIdByName($name)
    {
        $articles = self::getList();
        foreach ($articles as $article) {
            if ($article['name'] == $name) {
                return $article['id'];
            }
        }
        return false;
    }
    
         /**
     * Returns location of entity.
     * 
     * @return string Location
     * 
     * @abstract
     */
    public function getLocation()
    {
        return Yii::app()->createAbsoluteUrl('/articles/article/view', array('id' => $this->id, 'lang' => 'ru'));
        
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
        return self::DEFAULT_PRIORITY;
    }
}