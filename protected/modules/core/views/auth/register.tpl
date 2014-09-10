<?php
    $viewName    = Yii::t('core', 'Registration');
    $buttonValue = Yii::t('core', 'Register');

    $this->pageTitle = Yii::app()->name . ' - ' . $viewName;
?>

<div class ="core-form-block">
    <div class="title"><?php echo $viewName ?>:</div>

    <?php
        $form = new CForm(array(
                'activeForm' => array(
                    'id'                     => 'register-form',
                    'enableAjaxValidation'   => false,
                    'enableClientValidation' => true,
                    'clientOptions'          => array(
                                'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array(
                                'autocomplete'     => 'off',
                    ),
                ),
                'model'            => $model,
                'elements'         => array(
                    'first_name'   => array('type' => 'text'),
                    'last_name'    => array('type' => 'text'),
                    'email'        => array('type' => 'text'),
                    'password'     => array('type' => 'password'),
                    'confirmation' => array('type' => 'password'),
                ),
                'buttons' => array(
                    'Submit' => array(
                        'type'  => 'submit',
                        'value' => $buttonValue,
                    ),
                ),
        ));
    
        echo $form->render(); 
    ?>
    
    <div class="clear"></div>
</div>