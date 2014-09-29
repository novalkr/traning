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
                #click_link{
                    top: 10px;
                    color: white;
                    //background-color: brown;
                    position: absolute;


                }
                
                
                #click_link img{
                    heiht: 5px;
                    
                }

            </style>
            <div class="click">
                <?php $this->renderPartial('//layouts/_languages_bar'); ?>
                <?php echo "\n"; ?>
                <p id='click_link' onclick="$('.video_present').toggle();" >
                    <img src="/upload/click_mouse.png" />
                    kkkkkkkk
                </p>
                <?php echo "\n"; ?>
            </div>
            <script>

                /*
                 $(.click_link).on('click'){
                 
                 console.log('jjjjj');
                 };
                 */
                $(document).ready(function() {

                    $(".click_link").click(function() {
                        $(".video_present").toggle();
                    });

                });
/*
                $('.click_link').click({
                function() {
                    alert('Спасибо');
                    console.log('dddd');
                }


                });
    */
                        /*
                         video_show(){
                         console.log('jjjjj');
                         var w = $('.click').heiht()
                         //w = w/2
                         $(".click").css({'height': w+100});
                         
                         }
                         */
            </script>
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




        <div class="container" style="margin-top: 75px;">

            <!-- 
            <div class="row" style="margin-bottom: 20px;">
            </div><!-- module -->


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
                Copyright &copy; <?php echo date('Y'); ?> by JVIBA.<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->

        </div><!-- page -->

    </body>

</html>
