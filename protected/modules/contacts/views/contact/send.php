<?php $isGuest = Yii::app()->user->getIsGuest(); ?>
<?php $user = !$isGuest ? Yii::app()->user->getLogged() : null; ?>
<?php $form = new ExtForm(array(
    'model' => $model,
    'elements' => array(
        'name' => array(
            'type' => $isGuest ? 'text' : 'hidden',
            'value' => !$isGuest ? $user->getName() : '',
        ),
        'email' => array(
            'type' => $isGuest ? 'text' : 'hidden',
            'value' => !$isGuest ? $user->email : '',
        ),
        'subject' => array('type' => 'text'),
        'message' => array('type' => 'textarea'),
    ),
    'buttons' => array(
        'send' => array(
            'type' => 'submit',
            'value' => Yii::t('contacts', 'Send'),
        ),
    ),
)); ?>

<?php if (Yii::app()->user->hasFlash(YContactsController::MESSAGE_SENT)) : ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash(YContactsController::MESSAGE_SENT); ?>
    </div>
<?php endif; ?>

<?php $form->render(); ?>