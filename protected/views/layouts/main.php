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





        <div id="headers">

            <div id="logo-img">
                <?php
                //$ad= Yii::app()->getParams()->admin;   
                $this->widget('common.widgets.JvibaLogo');
                ?> 
            </div>

            <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'type' => 'inverse',
                //'brand' => CHtml::encode(Yii::app()->name),
                'brand' => false,
                'brandUrl' => array('/site/admin'),
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => require Yii::getPathOfAlias('application.config.menu') . '.php', //login_
                    ),
                ),
                //'id' => 'menu',//nav_menu
                //'itemOptions'=>array('id'=>'main_menu'),
                'htmlOptions' => array(
                    //'class' => 'row',
                    //'style' => 'border-width:5px; border-color: red;border-style:solid;width: 80%;margin:0 auto;text-align:center;' ,
                    'id' => 'menu-nav',
                )
            ));
            ?>

            <?php echo "\n"; ?>
            <style>
                .click{
                    display: block;
                    /*margin-top: 50px;*/
                    width: 100%;
                    background-image: url(/upload/click_ground.jpg);
                    background-repeat: no-repeat;
                    top:40px;
                    height:  40px;
                    position: absolute;
                    background-size: 100%;
                    vertical-align: middle;
                    //z-index: 2000;
                    line-height:normal;

                }

                #click_link{
                    top: 4px;
                    color: white;
                    //background-color: brown;
                    position: absolute;
                    left: 48%;

                }

                #click_link img{
                    height: 18px;


                }                
                .video_present{
                    top: 75px;
                    position: absolute;
                    width: 100%;
                    //display: block;
                    display: none;
                    height: 150px;
                    background-color: black;

                }
                #click_hide{
                    height: 150px;
                    display: none;
                }

            </style>
            <div class="click">
                <?php $this->renderPartial('//layouts/_languages_bar'); ?>
                <?php echo "\n"; ?>
                <p id='click_link' onclick="$('.video_present').toggle();
                    /*$('.container').css({'margin-top': '175px'});*/
                    $('#click_hide').toggle();
                   
                   " >
                    <img src="/upload/click_mouse.png" />
                    <br>
                        Click
                </p>
                <?php echo "\n"; ?>
            </div>
            <div class="video_present">

                df df s
                df 
                df 
                sdf

                dfg dg h 
                g 
                fg 
                hfgh
                fg fgh
                fg fg


            </div>          


        </div>




        <div class="container" style="margin-top: 80px;">

            <!-- 
            <div class="row" style="margin-bottom: 20px;">
            </div><!-- module -->
            <div id="click_hide"></div>

            <?php if ( isset($this->breadcrumbs) ): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="row buttonsPanel" style="text-align: right;">
                <?php
                $this->widget('YButtonsPanel', array(
                    'position' => 'bottom'
                ));
                ?>
            </div>

            <div class="clear"></div>

            <div id="footer">
                

    



                              <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'type' => 'inverse',
                'fixed'=>'sbottom',
                //'brand' => CHtml::encode(Yii::app()->name),
                'brand' => false,
                'brandUrl' => array('/site/admin'),
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => require Yii::getPathOfAlias('application.config.menu') . '.php', //login_
                    ),
                ),
                //'id' => 'menu',//nav_menu
                //'itemOptions'=>array('id'=>'main_menu'),
                'htmlOptions' => array(
                    //'class' => 'row',
                    //'style' => 'border-width:5px; border-color: red;border-style:solid;width: 80%;margin:0 auto;text-align:center;' ,
                    'id' => 'footer-menu-nav',
                )
            ));
            ?>
            <div id="footer-logo-img">
                <?php
                //$ad= Yii::app()->getParams()->admin;   
                $this->widget('common.widgets.JvibaLogo');
                ?> 
            </div>

                


            </div><!-- footer -->

        </div><!-- page -->

    </body>

</html>
