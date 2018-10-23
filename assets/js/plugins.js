(function ($) {
    'use strict';

    // blockui
    if ($.blockUI) {

        $(document).on('click', '#plugin .item-title', function() {
            var value = this.id;
            $("#detail").load(gurl + 'plugins/plugin_details/' + value);
            $('#detail').block({
                message: '<i class="fa fa-lg fa-refresh fa-spin"></i>' ,
                css: {
                    border: 'none',
                    backgroundColor: 'transparent',
                    color: '#fff',
                    padding: '30px',
                    width: '100%'
                },
                timeout: 1000
            });
        });
    }



})(jQuery);
