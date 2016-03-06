(function() {
    tinymce.PluginManager.add('galink_button', function( editor, url ) {
        editor.addButton( 'galink_button', {
            text: '',
            icon: 'icon galink-icon',
            onclick: function() {
            editor.windowManager.open( {
                title: 'Insert Google Analytics link',
                body: [{
                    type: 'textbox',
                    name: 'title',
                    label: 'Link Title *'
                },
                {
                    type: 'textbox',
                    name: 'href',
                    label: 'URL *'
                },
                {
                    type: 'checkbox',
                    name: 'blank',
                    label: 'Open link in a new window/tab.'
                },
                {
                    type: 'textbox',
                    name: 'eventcategory',
                    label: 'Event Category *'
                },
                {
                    type: 'textbox',
                    name: 'eventaction',
                    label: 'Event Action *'
                },
                {
                    type: 'textbox',
                    name: 'eventlabel',
                    label: 'Event Label'
                },
                {
                    type: 'textbox',
                    name: 'eventvalue',
                    label: 'Event Value'
                },
                ],
                onsubmit: function( e ) {
                    // input validation
                    if(e.data.title === '' || e.data.href === '' || e.data.eventcategory === '' || e.data.eventaction === '') {
                        var window_id = this._id;
                        var inputs = jQuery('#' + window_id + '-body').find('.mce-formitem input');

                        editor.windowManager.alert('Please fill in all required (*) fields in a popup.');

                        return false;
                    }
                    
                    editor.insertContent( '[galink url="' + e.data.href + '" title="' + e.data.title + '" blank="' + e.data.blank + '" ecat="' + e.data.eventcategory + '" eaction="' + e.data.eventaction + '" elabel="' + e.data.eventlabel + '" evalue="' + e.data.eventvalue + '" /]' );
                }
            });
        }
        });
    });
})();