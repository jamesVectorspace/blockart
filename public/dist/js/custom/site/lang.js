  "use strict";
  // user change language
$('.lang-change').on('click', function() {
    if (is_demo) {
        errorMessage(jsLang("Demo Mode! This action can't be perform."));
        return;
    }

    var lang = $(this).data('short-name');
    var url = SITE_URL + '/change-language';
    $.ajax({
        url   :url,
        data:{
            _token: CSRF_TOKEN,
            lang: lang,
            type: 'user'
        },
        type:"POST",
        success:function(data) {
            if (data) {
                location.reload();
            }
        },
         error: function(xhr, desc, err) {
            return 0;
        }
    });
});

function errorMessage(message, btnId) {
    toastMixin.fire({
        title: message,
        icon: 'error'
    });
    $(".loader").addClass('hidden');
    $('#'+ btnId).removeAttr('disabled');
}
