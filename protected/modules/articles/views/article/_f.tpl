<h4><?php echo Yii::t('article_form', 'Create Article'); ?></h4>

<?php

if ($model->scenario == YArticleDAO::SCENARIO_CREATE) {
    $this->menu = array(
        array(
            'label' => Yii::t('articles', 'Manage Articles'),
            'url'   => array('admin'),
        ),
        array(
            'label' => Yii::t('articles', 'Create Article'),
            'url'   => array('create'),
        ),
    );
} elseif ($model->scenario == YArticleDAO::SCENARIO_UPDATE) {

    $this->menu = array(
        array('label' => 'Main options'),
        array(
            'label' => Yii::t('articles', 'Content'),
            'url'   => array('/articles/article/update', 'id' => $model->article->id),
        ),

        array('label' => 'SEO'),
        array(
            'label' => Yii::t('articles', 'URL'),
            'url'   => array('/core/objectSeo/updateUrl',
                'id'    => $model->article->object_id),
        ),
        array(
            'label' => Yii::t('articles', 'Meta-tags'),
            'url'   => array('/core/objectSeo/updateMeta', 'id' => $model->article->object_id),
        ),

        array('label' => 'Actions'),
        array(
            'label'       => Yii::t('articles', 'Preview'),
            'url'         => array('/articles/article/preview', 'revisionId' => $model->article->sandbox->id),
            'linkOptions' => array(
                'target' => '_blank',
            ),
        ),
        array(
            'label'       => Yii::t('articles', 'View'),
            'url'         => array('/articles/article/view', 'id' => $model->article->id),
            'linkOptions' => array(
                'target' => '_blank',
            ),
            'visible'     => $model->article->isPublished,
        ),
    );
} else {
    $this->menu = array();
}

?>
<?php
    $cs = Yii::app()->getClientScript();

    YButtonsPanel::addButtons(array(
        array(
            'buttonType' => 'submit',
            'type'       => 'primary',
            'label'      => Yii::t('article_form', 'Save'),
            'htmlOptions' => array(
                'data-form' => 'articleForm',
            )
        ),
    ));
    if ($model->scenario == YArticleDAO::SCENARIO_UPDATE) {
        YButtonsPanel::addButton(
            array(
                'buttonType' => 'link',
                'url'        => array('publish', 'id' => $_GET['id']),
                'type'       => 'danger',
                'label'      => Yii::t('article_form', 'Publish'),
            )
        );
    }
?><div class="form">
<?php
    $cs = Yii::app()->getClientScript();
    $formConfig = array(
        'class' => 'well',
        'id'    => 'articleForm',
        'model' => $model,
        'enctype' => 'multipart/form-data',
        'elements' => array(
            'name' => array(
                'type' => 'text',
            ),
            'photo' => array(
                'type' => 'file',
            ),
            'categories' => array(
                'type' => 'jvibasta.extensions.widgets.input.asmselect.JAMSelect',
                'title'=>'Click to select here...',
                'data'=> $categories,
            ),
            'tags' => array(
                'type' => 'jvibasta.extensions.widgets.input.asmselect.JAMSelect',
                'title'=>'Click to select here...',
                'data'=> $tags,
            )
            
        ),
    );

    $form = new CForm($formConfig);
    echo $form->renderBegin();
    
    echo $form->renderElement('name');
    echo $form->renderElement('categories');
    echo $form->renderElement('tags');
    
    foreach ($langs as $lang) {
        $tabsArray[$lang['label']] = array('content' => $this->renderPartial('tabs_content', array(
            'lang'   => $lang,
            'model'  => $model,
        ), true), 'id' => $lang['id']);
    }
    ?>
    
    <?php
    $widget = $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs' => $tabsArray,
        'id'   => 'infos',
        'options' => array(
            'collapsible' => true,
        ),
    ));
    $options = CJavaScript::encode($widget->options);
    $js = <<<JS
$(document).ready(function() {
    $('#infos').tabs($options);
})
JS;

    Yii::app()->getClientScript()->registerScript('CJuiTabs#infos', $js);
    echo $form->renderButtons();
?>

<?php echo $form->renderEnd(); ?>

</div><!-- form -->

