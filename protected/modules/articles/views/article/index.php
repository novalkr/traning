
<?php
//Это мета данные

if ( $meta ) {
    Yii::app()->getComponent('metaHeader')
            ->addKeyword($meta->keywords)
            ->setDescription($meta->description);
    $this->pageTitle = $meta->title;
}
?>


<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('menu', 'Our Project');
?>

<?php
/*
  $model = YCMS::model('new', 'YArticleSearch')->getTagsList;
 */
?>



<?php $this->renderPartial('_category', array('model' => $model,)); ?>


<div     class="tags-list">
    <?php /*
      <b><?php echo Yii::t('articles', 'Tags'); ?>:</b>
     */ ?>
    <?php
//$tags = YCMS::model('YArticleRevision', 'model') ->getTagsNames();
    $tags = YCMS::model('YArticleTag', 'model')->getTagsList();
//$tags = $revision->getTagsList();
    for ( $i = 0; $i < count($tags); $i++ ) {
        echo (($i != 0) ? '<span class="tags-develiter">&bull;</span> ' : '');
        echo $link = CHtml::link(
                CHtml::encode(
                        Yii::t('tags', $tags[$i]['label'])), array(
            '/articles/article/index',
            'tags' => $tags[$i]['name']
                )
        ) . ' ';
    }
    ?>
</div>





<div     id="portfolio-list">

    <?php
    //echo $model->getMetaData()->tableSchema->columns;

    $this->widget('YArticlesList', array(// zii.widgets.CListView  YArticlesList
        'id' => 'articles-list-view',
        'dataProvider' => $model->search(),
        'itemView' => '_articles',
        'ajaxUpdate' => false,
        'pager' => array(
            'class' => 'CLinkPager',
            'maxButtonCount' => '6', // number of page labels  
            'firstPageLabel' => '', // remove '<<'
            'prevPageLabel' => Yii::t('articles', 'Previous'), // remove '<'
            'nextPageLabel' => Yii::t('articles', 'Next'), // remove '>'
            'lastPageLabel' => '', // remove '>>'
            'header' => '', // remove 'Go to page'
            'cssFile' => false, // styles defined by style.css'
        ),
        'htmlOptions' => array(
            'class' => 'row',
        //'style' => 'height: 320px;border-width:5px; border-color: red;border-style:solid;margin:0;padding:0;'
        ),
            //'enablePaginatin'=>false 
    ));
    ?>

</div>
<!-- end of index data -->

<script>

    /* make proporcial block*/
    var w = $('.articles-list-item').width()
    //w = w/2
    $(".articles-list-item").css({'height': w});
    $(".articles-list-item img").css({'height': w});

</script>


