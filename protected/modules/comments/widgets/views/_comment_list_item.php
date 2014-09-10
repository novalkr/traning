<div class="view" data-id="<?= $data->id; ?>">
    <div class="header-comment">
        <div class="author-comment">
            <?php
                echo '<b>' . CHtml::encode($data->author->getName()) . '</b> '
                   /* . Yii::t('comments', 'tells')*/;
            ?>
        </div>
        <div class="comment-date">
            <?php echo Yii::app()->dateFormatter->format('dd\MM\yyyy',CHtml::encode($data->object->create_time)); ?>
        </div>
        <div class="clear"></div>
    </div>

    
    <div class="text-comment">
        <?php Yii::app()->syntaxhighlighter->addHighlighter();
        echo $data->text; ?>    
    </div>
</div>