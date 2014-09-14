<?php
    $this->menu = array(
        array('label' => Yii::t('articles', 'Manage Articles'), 'url' => array('admin')),
        array('label' => Yii::t('articles', 'Create Article'), 'url' => array('create')),
        array(
            'label' => Yii::t('static', 'Preview'),
            'url' => array('preview', 'revisionId' => $model->article->sandbox->id),
        ),
        array(
            'label' => Yii::t('articles', 'View'),
            'url' => array('view', 'id' => $model->article->id),
            'visible' => $model->article->getIsPublished(),
        ),
        array('label' => Yii::t('articles', 'Update Url'), 'url' => array('/core/objectSeo/updateUrl', 'id' => $model->article->object_id)),
        array('label' => Yii::t('articles', 'Update Meta'), 'url' => array('/core/objectSeo/updateMeta', 'id' => $model->article->object_id)),
    );
?>
<?php echo CHtml::link('Publish this article', Yii::app()->createUrl('articles/article/publish', array('id' => $_GET['id']))); ?>
<?php
    $this->renderPartial('_form', compact('model', 'categories', 'tags','langs'));
?>

<h3><?php echo Yii::t('article_update', 'Revisions list'); ?></h3>
<ul>
    <?php
    $this->widget('core.widgets.YRevisionListView', array(
        'model' => $model->article,
    ));
    ?>
</ul>