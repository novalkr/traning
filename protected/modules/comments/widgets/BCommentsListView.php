<?php
Yii::import('cms.modules.comments.widgets.YCommentsListView');

/**
 * BCommentsListView class
 * 
 * display all comments list without pagination
 */
class BCommentsListView extends YCommentsListView
{
    /**
     * (non-PHPdoc)
     * @see CListView::init()
     */
    public function init() 
    {
        /**
         * Default item view path used for comment item rendering
         * @var string
         */
        $itemView = 'comments.widgets.views._comment_list_item';

        /**
         * Object ID to displaying comments for
         * @var integer
         */
        $to_object_id = null;

        /**
         * Default template for listview
         * @var string
         */
        $template = "{items}\n{pager}";

        if (isset($this->to_object_id) && !isset($this->dataProvider)) {
            $comments = YCMS::model('new', 'YCommentSearch');
            $comments->to_object_id = $this->to_object_id;
            $comments->setPageSize(false);
            $this->dataProvider = $comments->search();
        }
        parent::init();
    }
}
