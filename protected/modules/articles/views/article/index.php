
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
/*
  $model = YCMS::model('new', 'YArticleSearch')->getTagsList;
 */
?>



<div     class="categorys-list">
 
       <?php
//$url = Yii::app()->assetManager->publish(
//    Yii::getPathOfAlias('ext.myExtension.assets').'/image.png'
//);
//echo CHtml::image($url);    


    $categorys = YCMS::model('ArticleCategory', 'model')->getTagsList();



    for ( $i = 0; $i < count($categorys); $i++ ) {

        //Delete prefix 'c_' in name category
        $categories = $categorys[$i]['name'];
        $cat = strpos($categories, 'c_');
        if ( $cat === 0 ) {
            $categories = substr($categories, 2, strlen($categories) - 2);
        }

        //set alt in img tag
        //добавить переводилку ?
        $alt = '' . $categorys[$i]['label'];


        //giv images
        //перенести в assets--
        $root = dirname(Yii::app()->basePath);
        $upload = '/upload/category/';
        $img = $root . $upload . "/$categories.jpg";

        if ( file_exists($img) ) {
            //images present
            $img = $upload . "/$categories.jpg";
            $img = CHtml::image(
                            $img, $alt, array(
                        // "width"=>"250px" ,
                        //"height"=>"300px",
                        //"class" => "img-category",
                                'class'=>"img-circle"
                            )
            );
        } else {
            //no images
            $img = CHtml::encode($categorys[$i]['label']);
        }






        //output image
        echo $link = CHtml::link($img, array('/articles/article/index',
            'categories' => $categories
        )) . ' ';
    }
    ?>
</div>





<div     class="tags-list"><b><?php echo Yii::t('articles', 'Tags'); ?>:</b> 
    Вывести тэги здесь
    <?php
//$tags = YCMS::model('YArticleRevision', 'model') ->getTagsNames();
    $tags = YCMS::model('YArticleTag', 'model')->getTagsList();
//$tags = $revision->getTagsList();
    for ( $i = 0; $i < count($tags); $i++ ) {
        echo $link = CHtml::link(CHtml::encode($tags[$i]['label']), array('/articles/article/index',
            'tags' => $tags[$i]['name'])) . ' ';
    }
    ?>
</div>




<div     id="portfolio-list">

    <?php
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
        )
    ));
    ?>

</div>
<!-- end of index data -->

