<?php

/**
 * ArticleController clas file
 *
 * PHP version 5
 *
 * @category   JVIBA BLOG
 * @package    Module.articles
 * @subpackage Module.articles.controller
 * @author     Kristina Babich <kristina@jviba.com>
 * @license    http://jviba.com/display/license proprietary
 * @link       http://jviba.com/display/PhpDoc
 */

/**
 * ArticleController is the controller class
 * for managing Articles records
 *
 * PHP version 5
 *
 * @category   JVIBA BLOG
 * @package    Module.articles
 * @subpackage Module.articles.controller
 * @author     Kristina Babich <kristina@jviba.com>
 * @license    http://jviba.com/display/license proprietary
 * @link       http://jviba.com/display/PhpDoc
 */
class ArticleController extends YArticleController {

    public function accessRules() {
         $publicView = $this->getModule()->publicArticles;
        $env = array(
            array('allow',
                'actions' => array('list'),
                'roles' => array_merge(
                        array(
                    self::OPERATION_VIEW => array('id' => isset($_REQUEST['id']) ? $_REQUEST['id'] : null),
                        ), $publicView ? array(YAuthManager::ROLE_GUEST) : array()
                )
            ),
        );
return $env;
        return CMap::mergeArray($this->accessRules(), $env);
    }

    /**
     * Canonical URL for home page needed for SEO purposes
     * 
     * @return void
     * @see YArticleController::actionIndex()
     */
    public function actionIndex() {
        $this->layout = '//layouts/main';
        $model = YCMS::model('new', 'YArticleSearch');
        $model->revisionType = SandboxBehavior::PUBLISHED_REVISION;
        $model->addSortField('object.create_time', SearchModel::SORT_DIRECTION_DESC);
        $request = Yii::app()->request;

        if ( $categories = $request->getParam('categories') ) {
            $cat = strpos($categories, 'c_');
            if ( $cat === 0 ) {
                $model->categories = substr($categories, 2, strlen($categories) - 2);
            } else {
                $model->categories = $categories;
            }
            $categories = Yii::app()->controller->module->resolveTagsByNames($categories);
        }
        if ( $tags = $request->getParam('tags') ) {
            if ( $tags = Yii::app()->controller->module->resolveTagsByNames($tags) ) {
                $model->tags = $tags;
            } else {
                $model->tags = null;
            }
        }
        if ( $attributes = $request->getParam(get_class($model)) ) {
            $model->setAttributes($attributes);
        }
        $meta = array();

        $meta = $this->getModule()
                ->getComponent('categoryMetaBuilder')
                ->build($categories);


        $model->language = YLanguage::getIdByName(Yii::app()->getLanguage());
        $this->render('index', compact('model', 'meta'));


        /*


          if (Yii::app()->getLanguage() == 'en' && array_keys($_REQUEST) == array('lang')) {
          Yii::app()->getClientScript()->registerLinkTag(
          'canonical',
          null,
          Yii::app()->getRequest()->getHostInfo()
          );
          }

          //if (!$article = YCMS::model('YArticle', 'model')->findall()) {
          //    throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_NOT_FOUND));
          //}

          if (!$revision = YCMS::model('YArticleTag', 'model') ) {
          throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_NOT_PUBLISHED));
          }
          //$meta = Yii::app()->getModule('articles')->getComponent('metaBuilder')->build($revision);
          //parent::actionIndex();
          $this->render('index', compact( 'revision','meta'));
         * 
         */
    }

    /**
     * Displays the published articles by its ID.
     *
     * @param integer $id article identifier
     *
     * @return void
     * @throws CHttpException 404 if article not found, not published or not translated
     * in the application language set at the moment
     */
    public function actionView($id) {
          $this->layout = '//layouts/main';
        $id = (int) $id;
        $lang = Yii::app()->getLanguage();
        if ( !$article = YCMS::model('YArticle', 'model')
                        ->with(array('published'))->together(true)->findByPk($id) ) {
            throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_NOT_FOUND));
        }
        if ( !$revision = $article->published ) {
            throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_NOT_PUBLISHED));
        }
        if ( !$translatedInfo = $revision->getTranslatedInfo($lang) ) {
            throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_REVISION_NOT_TRANSLATED));
        }

        $meta = Yii::app()->getModule('articles')->getComponent('metaBuilder')->build($revision);
        //$comments = YCMS::model('new', 'YCommentSearch');
        //$comments->to_object_id = $article->object_id;
        $languages = array();
        foreach ( YLanguage::getList() as $language ) {
            $languages[$language['name']] = $revision->getIsTranslated($language['name']);
        }
        $commonData = array(
            'articleId' => $article->id,
            'languages' => $languages,
        );
        $globalData = Yii::app()->getModule('core')->getComponent('globalData');
        $globalData->addCommonData($commonData);
        $this->render('view', compact('translatedInfo', 'meta', /* 'comments', */ 'article', 'revision'));
    }

    public function actionList($id) {
          $this->layout = '//layouts/none';
        $id = (int) $id;
        $lang = Yii::app()->getLanguage();
        if ( !$article = YCMS::model('YArticle', 'model')
                        ->with(array('published'))->together(true)->findByPk($id) ) {
            throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_NOT_FOUND));
        }
        if ( !$revision = $article->published ) {
            throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_NOT_PUBLISHED));
        }
        if ( !$translatedInfo = $revision->getTranslatedInfo($lang) ) {
            throw new CHttpException(404, Yii::t('YArticleController', self::EXCEPTION_REVISION_NOT_TRANSLATED));
        }

        $meta = Yii::app()->getModule('articles')->getComponent('metaBuilder')->build($revision);
        //$comments = YCMS::model('new', 'YCommentSearch');
        //$comments->to_object_id = $article->object_id;
        $languages = array();
        foreach ( YLanguage::getList() as $language ) {
            $languages[$language['name']] = $revision->getIsTranslated($language['name']);
        }
        $commonData = array(
            'articleId' => $article->id,
            'languages' => $languages,
        );
        $globalData = Yii::app()->getModule('core')->getComponent('globalData');
        $globalData->addCommonData($commonData);
        $this->render('list', compact('translatedInfo', 'meta', /* 'comments', */ 'article', 'revision'));
    }

}
