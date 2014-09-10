<?php
    $viewName    = Yii::t('core', 'Password recovery');
    $buttonValue = $viewName;

    $this->pageTitle = Yii::app()->name . ' - ' . $viewName;
?>

<div class ="core-form-block">    
    <div class="title"><?php echo $viewName ?>:</div>

    <?php
        $form = new CForm(array(
                'activeForm' => array(
                    'id'                    => 'password-recovery-form',
                    'enableAjaxValidation'  => false,
                    'enableClientValidation'=> true,
                    'clientOptions'         => array(
                            'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array(
                            'autocomplete' => 'off',
                    ),
                ),
                'model' => $model,
                'elements' => array(
                    'email' => array('type' => 'text'),
                ),
                'buttons' => array(
                    'Submit' => array(
                        'type'  => 'submit',
                        'value' =>  Yii::t('core', 'Okay'),
                    ),
                ),
        ));

        echo $form->render(); 
    ?>
    
    <div class="clear"></div>
</div>