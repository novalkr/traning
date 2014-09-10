
    <div class="row">
        <?php echo CHtml::label('Title', '');?>
        <?php    $value = (isset($model->infos[$lang['id']]['title'])) ?  ($model->infos[$lang['id']]['title']) : '';
                 echo CHtml::textField("YArticleDAO[infos][".$lang['id']."][title]", $value );?>
    </div>

    <div class="row">
        <?php echo CHtml::label('Content', '');?>
        <?php    $value = (isset($model->infos[$lang['id']]['content'])) ? ($model->infos[$lang['id']]['content']) : '';

        $this->widget('jvibasta.thirdparty.widgets.newtinymce.TinyMce', array(
                'name'=>"YArticleDAO[infos][".$lang['id']."][content]",
                'value'    => $value,
                'language'=>'en',
                'settings' => array(
                    'theme'                           => 'advanced',
                    'theme_advanced_buttons4'         => '',
                    'plugins'                         => 'paste,media,embed,table,fullscreen',
                    'extended_valid_elements'         => 'iframe[src|title|width|height|allowfullscreen|frameborder]',
                    'content_css'                     => '/tinymce/style.css',
                    'paste_preprocess'                => 'js:function(ed, data) {
                        var content  = data.content
                            .replace(/<([^ ]+)[^<>]*>/gi, \'<$1>\') // remove all tags attributes
                            .replace(/<(?!\/?p)[^<>]*>/gi, \'\')    // remove all tags except p
                            .replace(/ {2,}/gi, \' \')              // replace 2 and more spaces with one
                            .replace(/__MCE_ITEM__/gi, \'\')        // remove __MCE_ITEM__
                            .trim();                                // trim text
                        data.content = content;
                    }',
                ),
            ));

        ?>
    </div>

