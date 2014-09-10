<div class="span-5" style="height: 200px;border-width:5px; border-color: blue;border-style:solid;">
    <!-- style="height: 200px;border-width:5px; border-color: red;border-style:solid;" -->
   <?php 
   /*class="pre-articles" 
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



    Yii::app()->syntaxhighlighter->addHighlighter();
    $alt= $data->published->info->shortText;
    $alt= strip_tags($alt);

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
               
              
            
            
            
            
            
/*               
            <div id="main_foto">
                    <?php echo $link;   ?>
            </div><!--main_foto-->
            */
?>
             
             
            
            


    




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
    
    
</div>