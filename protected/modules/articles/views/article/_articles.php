



<div class="articles-list-item" >

    <!-- style="height: 200px;border-width:5px; border-color: red;border-style:solid;" -->
    <?php
    /* class="pre-articles" 
      <div class="pre-titles">
      <h2>
      <?php
      echo CHtml::link(
      $data->published->getTranslatedInfo()->title,
      $this->createUrl('view', array('id' => $data->id)));
      ?>
      </h2>
      </div>

     */
    ?>


    <?php
    /*
      Yii::app()->syntaxhighlighter->addHighlighter();
      $alt= $data->published->info->shortText;
      $alt= strip_tags($alt);
      $alt= html_entity_decode($alt);
      $revision=$data->published;
      if (isset($revision->main_media_object_id)) {

      $img=$revision->getMainPhotoUrl(
      YArticleController::MAIN_PHOTO_GROUP,
      YArticleController::MAIN_PHOTO_FORMAT_MEDIUM);
      }else {

      //$img=Yii::app()->createAbsoluteUrl('../upload/no_image.jpg');
      $img=Yii::app()->request->baseUrl.'/upload/no_image.jpg';

      }

      $img= CHtml::image(
      $img,
      $alt,
      array(
      "width"=>"250px" ,
      "height"=>"300px",
      "class"=>"img-polaroid",
      )
      );


      $link=CHtml::link($img, $this->createUrl('view', array('id' => $data->id)));

      echo $link;



     */


    /*
      <div id="main_foto">
      <?php echo $link;   ?>
      </div><!--main_foto-->
     */
    ?>


    <?php
    $alt = $data->published->info->shortText;
    $alt = strip_tags($alt);
    $alt = html_entity_decode($alt);


    $root = dirname(Yii::app()->basePath);
    $upload = '/upload/portfolio/';
    $img = $root . $upload . $data->name . '/logo.jpg';

    //echo $data->name;
    //$img='/srv/www/work/tran8'.$img;
    if ( file_exists($img) ) {
        $img = $upload . $data->name . '/logo.jpg';
    } else {
        $img = $upload . 'nologo.jpg';
    }

    $img = CHtml::image(
                    $img, $alt, array(
                    // "width"=>"250px" ,
                    //"height"=>"300px",
                    "class" => "articles-list-item-img",
                    )
    );
    $link = CHtml::link($img, $this->createUrl('view', array('id' => $data->id)));
    ?>

        <?php         echo $img;         ?>
    <!-- <span class="articles-list-item-context" >-->
        <?php
        //$model->getMetaData()->tableSchema->columns;
        
       //echo ( $data->revisions);
        $title='<p>'.$data->published->info->title.'</p>';
        //$title=$data->published->info->shortText;
       echo CHtml::link($title, $this->createUrl('view', array('id' => $data->id)));
        
               ?>
    <!-- </span>-->
    
    <!-- <div class="articles-list-item-img"> -->
    <!-- </div> -->




    <?php
    /*
      <div class="author"><b><?php echo Yii::t('articles', 'Author'); ?>:</b> <?php echo $data->author->name; ?></div>

      <div class="publ-date">
      <b><?php echo Yii::t('articles', 'Date of publication'); ?>:</b> <?php echo $data->published->create_time; ?>
      </div>

      <div class="short-text">
      <?php Yii::app()->syntaxhighlighter->addHighlighter();
      echo $data->published->info->shortText; ?>
      </div>





      <div class="read-more">
      <?php echo CHtml::link(Yii::t('articles', 'read more'), $this->createUrl('view', array('id' => $data->id))); ?>
      </div>

     */
    ?>  
</div> <!--class="span-" -->
