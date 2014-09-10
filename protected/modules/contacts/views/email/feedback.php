<p>
    <?php echo Yii::t('contacts', 'Message from') . ':'; ?>
</p>
<p>
    <div>
        <?php echo Yii::t('contacts', 'Name'); ?>: <b><?php echo $model->name; ?></b>
    </div>
    <div>
        <?php echo Yii::t('contacts', 'Email'); ?>: <b><?php echo $model->email; ?></b>
    </div>
</p>
<p>
    <?php echo $model->message; ?>
</p>