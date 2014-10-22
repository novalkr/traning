<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"  xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <?php
        JavaScript::registerDebug(defined('YII_DEBUG') && YII_DEBUG);
        Yii::app()->getComponent('clientScript')->registerPackage('admin');
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
                    //'items' => require Yii::getPathOfAlias('application.config.admin_menu') . '.php',
                    'items' => require Yii::getPathOfAlias('application.config.menu') . '.php', 
                ),
                array(
                    'class' => 'bootstrap.widgets.TbButton',
                    'size' => 'small',
                    'label' => 'Logout',
                    'url' => $this->createUrl('/core/auth/logout'),
                    'htmlOptions' => array('class' => 'pull-right btn-large'),
                ),
                '<div class="pull-right">&nbsp;</div>',
                array(
                    'class' => 'bootstrap.widgets.TbButton',
                    'type' => 'primary',
                    'size' => 'small',
                    'label' => 'View Site',
                    'url' => '/',
                    'htmlOptions' => array('class' => 'pull-right btn-large'),
                ),
            ),
        ));
        ?>

        <div class="container" style="margin-top: 60px;">

            <div class="row" style="margin-bottom: 20px;">
                <div class="span1">
                    <img src="http://placehold.it/100x100">
                </div>

                <div class="span5">
                    <h3><?php if (isset($this->module)) {
                        echo $this->module->getName();
                    } ?></h3>
                </div>

                <div class="span6 buttonsPanel" style="text-align: right;">
                    <?php $this->widget('YButtonsPanel', array(
                        'position' => 'top',
                    )); ?>
                </div>
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
                    'position' => 'bottom',
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
