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
       <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'inverse',
            'brand' => CHtml::encode(Yii::app()->name),
            'brandUrl' => array('/site/admin'),
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => require Yii::getPathOfAlias('application.config.login_menu') . '.php',
                ),
            ),
        ));
        ?>

        <div class="container" style="margin-top: 60px;">

            <div class="row" style="margin-bottom: 20px;">
            </div><!-- module -->
            
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="row buttonsPanel" style="text-align: right;">
                <?php $this->widget('YButtonsPanel', array(
                    'position' => 'bottom'
                )); ?>
            </div>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by JVIBA.<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->
            
        </div><!-- page -->

</body>

</html>
