<?php $this->beginContent('//layouts/admin'); ?>

<div class="row">
    <div class="span3">
        <?php $this->widget('cms.modules.static.widgets.LeftMenuWidget', array(
            'items' => $this->menu,
        )); ?>
    </div>

    <div class="span9">
        <?= $content ?>
    </div>
</div>

<?php $this->endContent(); ?>