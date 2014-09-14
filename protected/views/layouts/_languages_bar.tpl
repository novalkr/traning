<ul class="languages">
    <?php $curLang = Yii::app()->language; ?>
    <?php $urlManager = Yii::app()->getComponent('urlManager'); ?>
    <?php $globalData = Yii::app()->getModule('core')->getComponent('globalData')->getCommonData(); ?>
    <?php foreach (YLanguage::getList() as $language) : ?>
        <?php 
        if(array_key_exists('articleId', $globalData)) {
            if (!$globalData['languages'][$language['name']]) {
                continue;
            }
        }
        ?>
        <?php echo CHtml::openTag('li', array('class' => $language['name'] == $curLang ? 'active' : '')); ?>
            <?php
               $template = "/\?p*/";
               $seo = explode("/", Yii::app()->request->requestUri);
               $seo = $seo[1] == 'en' || $seo[1] == 'ru' ? (isset($seo[2]) ? $seo[2] : '') : $seo[1];
               if (@preg_match($template, $seo, $mathces)) { 
                   $params = array($urlManager->languageParameterName => $language['name']);
                   $url = $this->createUrl('/'. $seo, $params);
               } 
               else {
                   $params = array_merge($_REQUEST, array($urlManager->languageParameterName => $language['name']));
                   $url = $this->createUrl($this->route == 'articles/article/index' ? '' : '/' . $this->route, $params);
               }
               $label = ucfirst(Yii::t('lang', $language['label']));
               echo CHtml::link($label, $url);
            ?>
        <?php echo CHtml::closeTag('li'); ?>
    <?php endforeach; ?>
</ul>