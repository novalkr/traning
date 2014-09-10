<?php
$login = Yii::t('core', 'Login');
$buttonValue = Yii::t('core', 'Entry');
$this->pageTitle = Yii::app()->name . ' - ' . $login;
?>
<div class ="core-form-block form">

    <div class="title"><?php echo $login ?>:</div>

    <?php
        $form = new CForm(array(
                'activeForm' => array(
                    'id' => 'login-form',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ),
                'model' => $model,
                'elements' => array(
                    'email' => array('type' => 'text'),
                    'password' => array('type' => 'password'),
                    'rememberMe' => array('type' => 'checkbox'),
                ),
                'buttons' => array(
                    Yii::t('login', 'Submit') => array(
                        'type' => 'submit',
                        'value' => $buttonValue,
                        'class' => 'login-button'
                    ),
                ),
        ));
    ?>
    
    <?php echo $form->renderBegin(); ?>
   
    
    <?php echo $form->renderElements(); ?>
    
    <?php echo $form->renderButtons(); ?>
    
    <div class="clear"></div>
    
    <div id="forgot-passw-button" class="login-button">
        <?php echo CHtml::link(Yii::t('core', 'Forgot your password?'), $this->createUrl('/core/auth/passwordRecovery')); ?>
    </div>
    <div id="registration-button" class="login-button">
        <?php echo CHtml::link(Yii::t('core', 'Registration'), $this->createUrl('/core/auth/registration')); ?>
    </div>
    
    <?php echo $form->renderEnd(); ?>
    
    <div class="clear"></div>
    
</div>