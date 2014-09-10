<?php

    $this->breadcrumbs = array(
        Yii::t('articles', 'Manage Articles') => array('admin'),
        //Yii::t('articles', 'View Article') . ' (' . $translatedInfo->article_revision->name . ')',
    );

    $this->menu = array(
        array('label' => Yii::t('articles', 'Create category'), 'url' => array('create')),
    );

    PageMetaHeader::addKeyword($meta->keywords);
    PageMetaHeader::setDescription($meta->description);
    $this->pageTitle = $meta->title;
?>

<h2><?php echo $translatedInfo->title; ?></h2>
<?php if ($this->getModule()->isRequiredPhoto && $mainPhoto = $revision->getMainPhoto()) : ?>
    <?php if ($photoUrl = $mainPhoto->getUrl($this->getModule()->thumbnailFormat, true)) : ?>
        <?php echo CHtml::image($photoUrl); ?>
    <?php endif; ?>
<?php endif; ?>

<?php 


//$this->widget('packages.extensions.widgets.social.SocialButton');
//$this->widget('packages.extensions.widgets.social.VKLikeButton');

//$this->widget('packages.extensions.widgets.social.SocialLikePanelWidget');


$language = 'php';
$showLineNumbers = false;

$content = '<p>This is a normal paragraph:</p>
<pre class="brush : php">
 $this->beginWidget(CMarkdown, array(purifyOutput=>true));
    echo $content;
$this->endWidget();
</pre>';

 Yii::app()->syntaxhighlighter->addHighlighter(); 


echo $translatedInfo->content;

?>


<?php
// comments

   
        $this->widget('comments.widgets.YCommentsListView', array(
            'dataProvider'=>$comments->search(),
            'itemView' => 'application.modules.comments.widgets.views._comment_list_item',
        ));

        $this->widget('comments.widgets.YCommentCreateFormView', array(
            'to_object_id' => $article->object_id,
            'view' => 'application.modules.comments.widgets.views._form'
        ));
    
?>