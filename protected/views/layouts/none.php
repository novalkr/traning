<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"  xmlns:fb="http://ogp.me/ns/fb#">

    <head>
        <?php
        JavaScript::registerDebug(defined('YII_DEBUG') && YII_DEBUG);
        Yii::app()->getComponent('clientScript')->registerPackage('frontend');
        JavaScript::registerAppNamespace('application');
        $this->widget('PageMetaHeader');
        ?>
    </head>

    <body>










        <div class="none-page" >

            



            <?php echo $content; ?>







        </div><!-- page -->

    </body>

</html>
