(function ($) {
	'use strict';

    
    $('[ui-jp], [data-ui-jp]').uiJp();
    $('body').uiInclude();
    $('[data-toggle="tooltip"]').tooltip();
    var gurl = '/page/';

    init();
    function init(){
      $('[data-toggle="tooltip"]').tooltip();
    }

    // pjax
    $(document).on('pjaxStart', function() {
        $('#aside').modal('hide');
        $('body').removeClass('modal-open').find('.modal-backdrop').remove();
        $('.navbar-toggleable-sm').collapse('hide');
    });
    
    if ($.support.pjax) {
      $.pjax.defaults.maxCacheLength = 0;
      var container = $('.pjax-container');
      $(document).on('click', 'a[data-pjax], [data-pjax] a, #aside a, .item a', function(event) {
        if($(".pjax-container").length == 0 || $(this).hasClass('no-ajax')){
          return;
        }
        $.pjax.click(event, {container: container, timeout: 6000, fragment: '.pjax-container'});
      });

      $(document).on('pjax:start', function() {
        $( document ).trigger( "pjaxStart" );
      });
      // fix js
      $(document).on('pjax:end', function(event) {
        
        $(event.target).find('[ui-jp], [data-ui-jp]').uiJp();
        $(event.target).uiInclude();

        $( document ).trigger( "pjaxEnd" );
        
        init();
      });
    }

    // blockui
    if ($.blockUI) {
      $(document).on('click', '#subnav .navside a, #subnav .item-title', function() { 
          $('#list').block({
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

      $(document).on('click', '#group .item-title', function() {
          var value = this.id;
          $("#detail").load(gurl + 'user/group_details/' + value);
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

    $(document).on('click', '#user .item-title', function() {
            var value = this.id;
            $("#detail").load(gurl + 'user/user_details/' + value);
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

    $(document).on('click', '#menu .item-title', function() {
        var value = this.id;
        $("#detail").load(gurl + 'utilities/menu_details/' + value);
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

    $(document).on('click', '#page .item-title', function() {
        var value = this.id;
        var user_id = $(this).attr('rel');
        $("#detail").load(gurl + 'page/page_details/' + value + '/' + user_id);
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





    $(document).on('click', '#DeleteUser', function() {

        var rel = this.rel;
        if (confirm('Are you sure you want to delete this user? ')) {
            window.location.href = gurl + 'user/delete_user/' + rel;
        }
    });

    $(document).on('click', '#DeleteGroup', function() {

        var rel = this.rel;
        if (confirm('Are you sure you want to delete this Group? ')) {
            window.location.href = gurl + 'user/delete_group/' + rel;
        }
    });

    $(document).on('click', '#DeleteGroup', function() {

        var rel = this.rel;
        if (confirm('Are you sure you want to delete this Group? ')) {
            window.location.href = gurl + 'user/delete_group/' + rel;
        }
    });



})(jQuery);
