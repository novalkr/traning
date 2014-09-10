<?php if (!Yii::app()->user->isGuest) : ?>

<div class="form">
    <?php
    $formConfig = array(
        'id' => 'comment-form',
        'model' => $model,
        'action'=> '/comments/comment/create',
        'elements' => array(
            'text' => array(
                'label' => Yii::t('comments', 'Send Comment'),
                'type'  => 'textarea',
                'rows' => '5',
                'cols' => '80'
            ),
            'to_object_id' => array(
                'type' => 'hidden',
                'value'=> $to_object_id,
            ),
        ),
        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('app', 'Post comment'),
            ),
        ),
    );



    //$formConfig['elements'] = CMap::mergeArray($formConfig['elements'], $languageSubFormConfigs);
    $form = new CForm($formConfig);
    echo $form->renderBegin();
    echo $form->renderElements();
    echo $form->renderButtons();
    ?>

    <?php echo $form->renderEnd(); ?>
</div><!-- form -->

<?php 
$textInputId = get_class($model) . '_text';
$js = <<<JS
    $('#comment-form').submit(function() {
        return $('#{$textInputId}').val() != '';
    });
JS;
Yii::app()->getClientScript()->registerScript(__FILE__ . '#comment-form', $js);
?>



<?php else : ?>

<?php $this->renderCanLeaveCommentBlock(); ?>

<?php endif; ?>