<?php
$this->breadcrumbs = array(
    Yii::t('articles', 'Manage Articles'),
);

$this->menu = array(
    array('label' => Yii::t('articles', 'Create Article'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $.fn.yiiGridView.update('articles-grid', {
                data: $(this).serialize()
            });
            return false;
        });
    ");

YButtonsPanel::addButton(array(
    'buttonType' => 'link',
    'url'        => array('create'),
    'type'       => 'primary',
    'icon'       => 'plus white',
    'label'      => Yii::t('users', 'Add article'),
));
?>

<?= CHtml::link(Yii::t('articles', 'Advanced Search'), '#', array(
    'class' => 'search-button btn btn-small'));
?>

    <div class="search-form" style="display: none">
        <p>
            You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
                &lt;&gt;</b>
            or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
        </p>

        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'         => 'striped bordered condensed',
    'id'           => 'articles-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'template'     => "{items}\n{pager}",
    'columns'      => array(
        array(
            'name' => 'name', 'value' => 'StringUtils::getHtmlShortText($data->name, 50)',
            'type' => 'raw',
        ),
        array('name' => 'authorEmail', 'value' => '$data->author->email'),
        array(
            'class'   => 'bootstrap.widgets.TbButtonColumn',
            'header'  => Yii::t('articles', 'Actions'),
            'buttons' => array(
                'view' => array(
                    'visible' => '$data->isPublished',
                    'options'=>array('target'=>'_blank'),
                ),
            ),
        ),
    ),
)); ?>