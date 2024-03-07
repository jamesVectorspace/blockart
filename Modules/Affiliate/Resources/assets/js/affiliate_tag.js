"use strict";
if ($('.main-body .page-wrapper').find('#affiliate-tag-container').length) {
    $(document).on( 'init.dt', function () {
        $(".dataTables_length").remove();
        $('#dataTableBuilder').removeAttr('style');
    });
    dataTable('#dataTableBuilder', [2]);
    function dataTable(tableSeclector, target)
    {
        $(tableSeclector).DataTable({
            "columnDefs": [{
                "targets": target,
                "orderable": false
            }],
            "language": {
                "url": app_locale_url
            },
            "pageLength": row_per_page,
            "order" :  [[ 0, 'asc' ]]
        });
    }

    $(document).on('keyup', '#slug', function() {
        var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
        $('#slug').val(str.trim().toLowerCase().replace(/\s/g, "-"));
    });

    $(document).on('keyup', '#name', function() {
        var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
        $('#slug').val(str.trim().toLowerCase().replace(/\s/g, "-"));
    });

    $(document).on('keyup', '#edit_slug', function() {
        var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
        $('#edit_slug').val(str.trim().toLowerCase().replace(/\s/g, "-"));
    });

    $(document).on('keyup', '#edit_name', function() {
        var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
        $('#edit_slug').val(str.trim().toLowerCase().replace(/\s/g, "-"));
    });

    $(document).on('click', '.edit_tag', function () {
        let url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#edit_name').val(data.tag.name);
                $('#edit_slug').val(data.tag.slug);
                $('#parent_id').val(data.tag.parent_id).trigger('change');
                $('#summary').val(data.tag.summary);
                $('#tag_id').val(data.tag.id);
                $('#parent_id').empty()
                $('#parent_id').append($('<option>', {
                    value: '',
                    text : jsLang('Select One')
                }));
                $.each(data.tagList, function (i, tag) {
                    $('#parent_id').append($('<option>', {
                        value: tag.id,
                        text : tag.name
                    }));
                });
                $('#parent_id').val(data.tag.parent_id);
                $('#edit-tag').modal();
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
}
