<div>
<?php echo CHtml::link(Yii::t('articles', 'Update'), array('update', 'id' => $article->id)); ?>
</div>
<div>
<?php echo CHtml::link(Yii::t('articles', 'Publish'), array('publish', 'id' => $article->id)); ?>
</div>
<?php $this->renderPartial('view', compact('meta', 'revision', 'translatedInfo', 'article', 'comments')); ?>