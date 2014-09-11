
<?php


    if ($meta) {
        Yii::app()->getComponent('metaHeader')
                  ->addKeyword($meta->keywords)
                  ->setDescription($meta->description);
        $this->pageTitle = $meta->title;
    }
    
    
?>

<?php
/*
$model = YCMS::model('new', 'YArticleSearch')->getTagsList;
*/

?>


Вывести тэги здесь


<div     class="tags"><b><?php echo Yii::t('articles', 'Tags'); ?>:</b> 
    <?php
        $tags = YCMS::model('YArticleRevision', 'model') ->getTagsNames();
        //$tags = $revision->getTagsList();
        for ($i = 0; $i < count($tags); $i++) {
            echo $link = CHtml::link(CHtml::encode($tags[$i]['label']), 
                                     array('/articles/article/index', 'tags' => $tags[$i]['name'])) . ' ';
        }
    ?>
</div>


<?php 
    $this->widget('YArticlesList', array(       // zii.widgets.CListView  YArticlesList
        'id'            => 'articles-list-view',
        'dataProvider'  => $model->search(),
        'itemView'      =>'_articles',
        'ajaxUpdate' => false,
        'pager'         => array(                   
            'class'          => 'CLinkPager',
            'maxButtonCount' => '6',            // number of page labels  
            'firstPageLabel' => '',             // remove '<<'
            'prevPageLabel'  => Yii::t('articles', 'Previous'), // remove '<'
            'nextPageLabel'  => Yii::t('articles', 'Next'),     // remove '>'
            'lastPageLabel'  => '',             // remove '>>'
            'header'         => '',             // remove 'Go to page'
            'cssFile'        => false,          // styles defined by style.css'
        ),
		'htmlOptions' => array (
				'class' => 'row',
				'style' => 'height: 200px;border-width:5px; border-color: red;border-style:solid;margin:0;padding:0;' 
		) 
        
    ));
?>

  <!-- end of index data -->

