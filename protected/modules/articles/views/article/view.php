
<script type="text/javascript">
    window.___gcfg = {lang: 'ru'};

    (function() {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();
</script>

<?php
Yii::app()->getComponent('metaHeader')
        ->addKeyword($meta->keywords)
        ->setDescription($meta->description);
$this->pageTitle = $meta->title;
Yii::app()->getClientScript()->registerLinkTag(
        "canonical", null, $this->createAbsoluteUrl('/articles/article/view', array('id' => $article->id))
);
?>



<div class="social">
    <?php $this->renderPartial('/article/_social_panel'); ?>
</div>



<h1 class="article-title"><?php echo $translatedInfo->title; ?></h1>

<?php
/*
  <div class="author"><b><?php echo Yii::t('articles', 'Author'); ?>:</b> <?php echo $article->author->name; ?></div>
 */
?>

<?php /*
  Пишем фото
  <?php if ($this->getModule()->isRequiredPhoto && $mainPhoto = $revision->getMainPhoto()) : ?>
  Пишем фото
  <?php if ($photoUrl = $mainPhoto->getUrl($this->getModule()->thumbnailFormat, true)) : ?>
  <?php echo CHtml::image($photoUrl); ?>
  <?php endif; ?>
  <?php endif; ?>


  Photo photo photo

  <?php echo $this->getModule()->isRequiredPhoto; ?>
  Photo photo photo1<br>

  <?php


  //echo $revision->getMainPhoto() ;
  ?>

  <?php if ($this->getModule()->isRequiredPhoto
  && $mainPhoto = $this->$revision->getMainPhoto()) : ?>
  <div class="aticles-photo">
  Photo photo photo2<br>

  <?php if ($photoUrl = $mainPhoto->getUrl($this->getModule()
  ->thumbnailFormat, true)) : ?>
  <?php echo CHtml::image($photoUrl); ?>
  <?php endif; ?>
  </div>
  <?php endif; ?>




  <?php if ($this->getModule()->isRequiredPhoto
  && $mainPhoto = $revision->getMainPhoto()) : ?>
  <?php if ($photoUrl = $mainPhoto->getUrl($this->getModule()
  ->thumbnailFormat, true)) : ?>
  <?php echo CHtml::image($photoUrl); ?>
  <?php endif; ?>
  <?php endif; ?>

 */
?>



<?php
/*
  <?php
  //Это работает
  if ( isset($revision->main_media_object_id) ) :
  ?>

  <?php
  //$socialFoto = $revision->getMainPhotoUrl(
  //YArticleController::MAIN_PHOTO_GROUP,
  //YArticleController::MAIN_PHOTO_FORMAT_MEDIUM);
  ?>
  <div id="main_foto">
  <img src=
  "<?php
  echo $revision->getMainPhotoUrl(
  YArticleController::MAIN_PHOTO_GROUP, YArticleController::MAIN_PHOTO_FORMAT_MEDIUM)
  ?>"
  width="" height="" class="img-polaroid">
  </div><!--main_foto-->
  <?php endif; ?>
 */
?>



<?php
/*
  <div class="tags"><b><?php echo Yii::t('articles', 'Tags'); ?>:</b>
  <?php //Тэги
  $tags = $revision->getTagsNames();
  for ( $i = 0; $i < count($tags); $i++ ) {
  echo $link = CHtml::link(CHtml::encode($tags[$i]['label']), array('/articles/article/index', 'tags' => $tags[$i]['name'])) . ' ';
  }
  ?>
  </div>
 */
?>


<?php
/*
  <?php
 * 
  <div class="publ-date">
  <b><?php echo Yii::t('articles', 'Date of publication'); ?>:</b>
 * <?php echo $revision->create_time; ?>
  </div>
 */
?>



<div class="article-content">
    <?php
    Yii::app()->syntaxhighlighter->addHighlighter();
    echo $translatedInfo->content;
    ?>
</div>




<?php
/*
  <div class="social">
  <?php $this->renderPartial('/article/_social_panel'); ?>
  </div>
 */
?>
<?php
/*
  <div class="article-comments-block">
  <div class="comments-title"><?php echo Yii::t('comments', 'Article comments'); ?></div>
  <?php
  if ($this->getModule()->useCommenting) : ?>
  <div class="comments">
  <?= Yii::t('comments', 'Comments:');?>
  <div id="comments-list">
  <?php
  $this->widget('application.modules.comments.widgets.BCommentsListView', array(
  'dataProvider'=>$comments->search(),
  'itemView' => 'application.modules.comments.widgets.views._comment_list_item',
  ));
  ?>
  </div>
  <div class="comment-form">
  <?php
  $this->widget('cms.modules.comments.widgets.YCommentCreateFormView', array(
  'to_object_id' => $article->object_id,
  'view' => 'application.modules.comments.widgets.views._form'
  ));
  ?>
  </div>
  </div>
  <?php endif; ?>
  </div>
 */
$url_list= CHtml::link(
        'To view', $this->createUrl(
                'list', array('id' => $revision->article->id)
        ), 
        array('target' => '_blank',/* , 'type' => 'raw', *//*'class'=>'begemot'*/)
);
echo $url_list;
?>