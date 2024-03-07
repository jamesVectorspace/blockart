'use strict';

if ($('.main-body .page-wrapper').find('#long_article-list-container').length) {
    $(document).on("click", "#csv, #pdf", function(event) {
        event.preventDefault();
        window.location = SITE_URL + "/articles/" + this.id;
    });
}