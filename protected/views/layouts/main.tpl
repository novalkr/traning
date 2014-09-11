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
    
    
    <div id="logo-img">
    <?php // $this->widget('common.widgets.JvibaLogo'); ?>    
</div>
    
    
    <style>
  /*      
#headers   .navbar-inner{
    border-width:5px;
    border-color: red;
    border-style:solid;
    width: 80%;
    margin: 0 auto;
}​
*/
#menu-nav .navbar-inner{
    background-color:white;
    //background-repeat: repeat;
     background-image: none;
}

#menu-nav a{
 background-color:white;
}
/*
#menu-nav  .nav ul{
display: inline;
}
*/
#menu-nav  .nav{
    /*width: 80%;*/
    
    border-width:5px;
    border-color: red;
    border-style:solid;
/*
    margin:0 auto;*/
    /*text-align:center;*/
    /*margin-left: 200px;*/
    /*background-color:white;
    background-image: none;
    */
        /*centring*/
        
      left: 30%;
      /*margin-left: -75px;*/
      position: absolute;
      /*width: 300px; 
      
}
/*
#yw2{
    /*width: 80%;*/
    border-width:5px;
    border-color: red;
    border-style:solid;
    /*margin:0 auto;*/
    /*text-align:center;*/
    /*width: 50%;*/
    
    
}     
*/
    </style>
    
    
    <div id="headers">
       <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'inverse',
            //'brand' => CHtml::encode(Yii::app()->name),
            'brand' => CHtml::encode(Yii::app()->name),
            'brandUrl' => array('/site/admin'),
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => require Yii::getPathOfAlias('application.config.menu') . '.php',//login_
                ),
            ),
            //'id' => 'menu',//nav_menu
            //'itemOptions'=>array('id'=>'main_menu'),
            
            'htmlOptions' => array (
				//'class' => 'row',
				//'style' => 'border-width:5px; border-color: red;border-style:solid;width: 80%;margin:0 auto;text-align:center;' ,
                                'id'=>'menu-nav',
		) 
                
        ));
        ?>
    </div>
        
        
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
