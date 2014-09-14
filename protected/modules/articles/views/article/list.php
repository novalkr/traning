тут ссылка на посмотреть проект
<br>

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

echo $dir;
echo "<br>";

if ( is_dir($dir) ) { // проверяем наличие директории
    $files = scandir($dir); // сканируем (получаем массив файлов)
    array_shift($files); // удаляем из массива '.'
    array_shift($files); // удаляем из массива '..'
    /*
      for ( $i = 0; $i < sizeof($files); $i ++ ) {
      $array [] = $files [$i]; // выводим все файлы
      }
     */

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
        echo $img_url;
        echo "<br>";

        $img = CHtml::image($img_url, 'present of ' . $portfolio, array(
                    "width" => "320px",
                    "height" => "320px"
        ));

        echo CHtml::link($img, $img_url);
    }
    // return $array;
}
?>

<br>