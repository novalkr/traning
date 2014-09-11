(function( $, undefined) {

$.widget("ui.contacts_menu_bar", {
    
    options: {
        popupButtons: Array(),
        contactUsButton: 'contact_us_link',
        detailview_id: '',
        contactPopup: 'contact-popup'
    },
    
    /**
     * Contact popup jQuery cache
     */
    _contactPopup: null,
    
    /**
     * Returns contact popup object
     */
    getContactPopup: function() {
        if (!this._contactPopup) {
            this._contactPopup = $('#' + this.options.contactPopup);
        }
        return this._contactPopup;
    },
    
    /**
     * Initialization
     */
    _create: function() {
        for (var i = 0; i < this.options.popupButtons.length; ++i) {
            this._bindButtonEvents(this.options.popupButtons[i], i);
        }
        var self = this;
        $('#'+this.options.contactUsButton).bind('mouseover', function(event) {
            self.getContactPopup().popup_message('hide');
        })
    },
    
    /**
     * Binds contact button events
     * 
     * @param integer id    button identifier
     * @param integer index button index
     * 
     * @return void
     */
    _bindButtonEvents: function(id, index) {
        var self = this;
        $('#' + id)
            .bind('mouseover', function(event) {
                var popup = self.getContactPopup();
                popup.popup_message('option', 'relative', $(this));
                popup.popup_message('updatePosition');
                var detailview = popup.find('#' + self.options.detailview_id);
                var rows = detailview.find('tr');
                rows.removeClass('active');
                $(rows.get(index)).addClass('active');
                $('#contact_us_dialog').ext_dialog('close');
                popup.popup_message('show');
            })
            .bind('mouseout', function(event) {
                //self.getContactPopup().popup_message('hide');
            });
    },
    
    /**
     * Returns popups frame borders
     * 
     * @return object popups frame borders
     */
    getFramingPosition: function() {
        var wnd = $(window);
        var top = wnd.scrollTop();
        var height = wnd.height();
        var width = wnd.width();
        var ret = {
            top: top,
            left: 0,
            bottom: top + height,
            right: width,
            width: width,
            height: height
        };
        return ret;
    }
    
});

}) (jQuery);