

<?php
//Это граммотный способ
//$dir = Yii::getPathOfAlias ( 'webroot.images.' . $model->name );
//$dir = Yii::getPathOfAlias ( 'application.assets' . $portfolio . $model->name );



$portfolio = $revision->article->name;
$root = dirname(Yii::app()->basePath);
$upload = '/upload/portfolio/';


//from assets
//$alis = Yii::app()->assetManager->publish(
//                Yii::getPathOfAlias ( 'application.assets.portfolio.' . $portfolio ));
//$dir=$root .$alis;
//from upload
$dir = $root . $upload . $portfolio;

//echo $dir;
//echo "<br>\n";

if ( is_dir($dir) ) { // проверяем наличие директории
    $files = scandir($dir); // сканируем (получаем массив файлов)
    array_shift($files); // удаляем из массива '.'
    array_shift($files); // удаляем из массива '..'
    /*
      for ( $i = 0; $i < sizeof($files); $i ++ ) {
      $array [] = $files [$i]; // выводим все файлы
      }
     */
    $key=array_search('logo.jpg',$files);
    if(!($key===false)){
        unset($files[$key]);
    }
    
    if ( sizeof($files) == 0 ) {
       $portfolio='';
       $upload='/upload/';
       $files[]='no_image.jpg';
        
    }
    
    if ( sizeof($files) > 0 ) {
        ?>
        <div id="carousel-portfolio" class="carousel slide" data-ride="carousel">
            <?php
            
            
            //next code workin in bootstrap v 3.0 and upper
            /*
              <!-- Индикаторы -->
              <ol class="carousel-indicators">

              <?php
              for ( $i = 0; $i < sizeof($files); $i ++ ) {
              if ( $files[$i] == 'logo.jpg' ) {
              continue; //по теори logo.jpg  в параметры
              }
              $s = '';
              $s = $s . "\t\t\t\t\t";
              $s = $s . '<li data-target="#carousel-portfolio" data-slide-to="';
              $s = $s . $i;
              $s = $s . '" ';
              $s = $s . (($i == 0) ? ' class="active" ' : '');
              $s = $s . '></li>';
              $s = $s . "\r"; //
              echo $s;
              }
              ?>
              </ol>
             * 
             */
            ?>


            <div class="carousel-inner">
                <?php
                $i = 0;
                foreach ( $files as $name ) {

                    if ( $name == 'logo.jpg' ) {
                        continue; //по теори logo.jpg  в параметры
                    }



                    //Правильно через алисы application
                    //$img_url = Yii::app()->assetManager->publish(
                    //Yii::getPathOfAlias('webroot.assets.' . $portfolio).$name);
//          Yii::getPathOfAlias('basePath.assets.' . $portfolio).$name);
                    //Yii::getPathOfAlias('application.' . $portfolio).'/'.$name);
                    //$img_url = Yii::app ()->request->baseUrl . '/images/' . $model->name . '/' . $name;
                    //from upload
                    $img_url = $upload . $portfolio . '/' . $name;

                    //from assets
                    //$img_url =$alis. '/' . $name;
                    //echo $img_url;
                    //echo "<br>";

                    $img = CHtml::image($img_url, 'present of ' . $portfolio
                                    //, array(
                                    //    "width" => "320px",
                                    //    "height" => "320px"
                                    //)
                    );
                    ?> 
                    <div class="item <?php echo (($i++ == 0) ? 'active' : ' ') ?>">
                        <?php
                        echo $img;
                        ?>
                        <?php
                        /*
                          <div class="carousel-caption">
                          <p>
                          <?php echo $img_url;?>
                          </p>
                          </div>
                         */
                        ?>
                    </div>


                    <?php
                    //echo CHtml::link($img, $img_url);
                }
                ?>

                <!-- Контролы -->
                <a class="left carousel-control" href="#carousel-portfolio" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    &lsaquo;
                </a>
                <a class="right carousel-control" href="#carousel-portfolio" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    &rsaquo;
                </a>
            </div>                

            <?php
        }
        // return $array;
    }
    ?>

