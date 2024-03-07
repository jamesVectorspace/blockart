"use strict";

$(document).on('init.dt', function () {
    $(".dataTables_length").remove();
    $('#dataTableBuilder').removeAttr('style');
});

function dataTable(tableSeclector, target) {
    $(tableSeclector).DataTable({
        "columnDefs": [{
            "targets": target,
            "orderable": false
        }],
        "language": {
            "url": app_locale_url
        },
        "pageLength": row_per_page,
        "order": [[0, 'asc']]
    });
}

if ($('.main-body .page-wrapper').find('#affiliate-campaign-container').length) {
    dataTable('#dataTableBuilder', [3]);

    $(document).on('keyup', '#slug', function() {
        var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
        $('#slug').val(str.trim().toLowerCase().replace(/\s/g, "-"));
    });

    $(document).on('keyup', '#name', function() {
        var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
        $('#slug').val(str.trim().toLowerCase().replace(/\s/g, "-"));
    });

    $(document).on('click', '.edit_tag', function () {
        let url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#edit_name').val(data.campaign.name);
                $('#summary').val(data.campaign.summary);
                $('#link').val(data.campaign.link);
                $("#edit_summernote").summernote("code", data.campaign.description);
                $('#campaign_id').val(data.campaign.id);
                $('#visibility').empty();
                $.each(data.tags, function (i,v){
                    $('#visibility').append(`<option value="${i}" selected>
                                       ${v}
                                  </option>`);
                })
                $('#edit-campaign').modal();
            }
        });

    });

    $('#confirmDelete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var modal = $(this);
        $('#confirmDeleteSubmitBtn').attr('data-task', '').removeClass('delete-task-btn');
        if (button.data("label") == 'Delete') {
            modal.find('#confirmDeleteSubmitBtn').addClass('delete-task-btn').attr('data-task', button.data('id')).text(jsLang('Yes, Confirm')).show();
            modal.find('#confirmDeleteLabel').text(button.data('title'));
            modal.find('.modal-body').text(button.data('message'));
        }
        $('#confirmDeleteSubmitBtn').on('click', function () {
            $('#delete-language-' + $(this).data('task')).trigger('submit');
        });
    });

    $(".affiliate_tag").select2({
        ajax: {
            url: SITE_URL + '/affiliate/find-affiliate-tag-in-ajax',
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                };
            },
            processResults: function (data, params) {
                let results = data.data;
                return {
                    results: results
                };
            },
            cache: true,
        },
        placeholder: jsLang("Search for an affiliate tag."),
        minimumInputLength: 3,
    });

    $(document).ready(function () {
        $(".summernote").summernote({
            tabsize: 2,
            height: 120,
            blockquoteBreakingLevel: 2,
            styleTags: [
                "p",
                {
                    title: "Blockquote",
                    tag: "blockquote",
                    className: "blockquote",
                    value: "blockquote",
                },
                "pre",
                "h1",
                "h2",
                "h3",
                "h4",
                "h5",
                "h6",
            ],
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link"]],
                ["view", ["codeview", "help"]],
            ],
            codeviewFilter: true,
            codeviewFilterRegex: summernote_regex,
            callbacks:
                {
                    onInit: function()
                    {
                        var button = '<button id="makeSnote" type="button" class="note-btn editor-img-btn btn btn-default btn-sm has-media-manager" data-val="single" tabindex="-1" title="" aria-label="Picture" data-original-title="Picture" aria-describedby="tooltip682862"><i class="note-icon-picture"></i></button>';
                        var fileGroup = '<div class="note-file btn-group note-btn-group">' + button + '</div>';
                        $(fileGroup).appendTo($('.note-toolbar'));
                    },
                    onChange: function() { }    // callback as option

                }
        });
    });

    $(document).on("file-attached", ".editor-img-btn", function (e, data) {
        data.data.forEach((element) => {
            if ($('#add-campaign').hasClass('show')) {
                $('#summernote').summernote('pasteHTML', ' <span><img src="' + element.url + '" style="width: 200px;"/><br></span>');
            } else if ($('#edit-campaign').hasClass('show')) {
                $('#edit_summernote').summernote('pasteHTML', ' <span><img src="' + element.url + '" style="width: 200px;"/><br></span>');
            }
        });
    });
}

if ($('.main-body .page-wrapper').find('#affiliate-user-campaign-container').length) {
    dataTable('#dataTableBuilder', [3]);
}
