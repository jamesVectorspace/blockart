"use strict";
if ($('.main-body .page-wrapper').find('#commission-plan-container').length) {
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

if ($('.main-body .page-wrapper').find('#commission-plan-create-container').length || $('.main-body .page-wrapper').find('#commission-plan-edit-container').length) {
    var existsGroupNumber = 0;
    affiliateUserAjaxSelect();

    if ($('.main-body .page-wrapper').find('#commission-plan-edit-container').length) {
        $.each($('.rule_name'), function (){
            ruleNameCheck($(this), false);
        });
    }

    $(document).on('change', '#level', function(event) {
        let totalLevel = parseInt($(this).val());
        let commission = $('#commission').val();
        addMultilevelOption(totalLevel, '#multi_level', commission);
    });

    $(document).on('change', '#commission', function(event) {
        let commission = parseInt($('#commission').val());
        let commissionType = $('#commission_type').val();
        $.each($('.tier'), function (i,v){

            if (i == 0) {
                $(this).val(commission);
            }

            if (i != 0 && parseInt($(this).val()) > 0) {
                commission += parseInt($(this).val());
            }
        });

        $('#totalCommission').text(commissionType == 'flat' ? commission + currencySymbol : commission + '%')
    });

    $(document).on('change', '.tier,#commission_type', function(event) {
        let commission = 0;
        let commissionType = $('#commission_type').val();
        $.each($('.tier'), function (i,v){
            if (parseInt($(this).val()) > 0) {
                commission += parseInt($(this).val());
            }
        });

        $('#totalCommission').text(commissionType == 'flat' ? commission + currencySymbol : commission + '%')
    });

    $(document).on('change', '.rule_name', function(event) {
        ruleNameCheck($(this));
    });

    function ruleNameCheck($this, isRemove = true)
    {
        let ruleName = $this.val();
        let divId = $this.parent().next('.condition').next('.rule_value_div').find('.rule_value').attr('id');
        if (isRemove) {
            $('#'+divId).find('option').remove();
        }
        $('#'+divId).removeClass('affiliate_user');
        $('#'+divId).removeClass('affiliate_tag');
        $('#'+divId).removeClass('package');
        $('#'+divId).removeClass('product_category');
        $('#'+divId).removeClass('credit');

        if (ruleName == 'affiliate_user') {
            $('#'+divId).addClass('affiliate_user');
            affiliateUserAjaxSelect();
        } else if (ruleName == 'affiliate_tag') {
            $('#'+divId).addClass('affiliate_tag');
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
        } else if (ruleName == 'package') {
            $('#'+divId).addClass('package');
            $(".package").select2({
                ajax: {
                    url: SITE_URL + '/affiliate/find-packages-in-ajax',
                    dataType: "json",
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page,
                            variation : 'yes',
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
                placeholder: jsLang("Search for a package."),
                minimumInputLength: 3,
            });
        } else if (ruleName == 'product_category') {
            $('#'+divId).addClass('product_category');
            $(".product_category").select2({
                ajax: {
                    url: SITE_URL + '/affiliate/find-category-in-ajax',
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
                placeholder: jsLang("Search for a category."),
                minimumInputLength: 3,
            });
        } else if (ruleName == 'credit') {
            $('#'+divId).addClass('credit');
            $(".credit").select2({
                ajax: {
                    url: SITE_URL + '/affiliate/find-credits-in-ajax',
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
                placeholder: jsLang("Search for a credit."),
                minimumInputLength: 3,
            });
        }
    }

    $(document).on('click', '.add_rule', function(event) {
        existsGroupNumber = $(this).attr('data-groupNumber');
        let divId = $(this).parent().parent().parent().attr('data-cid');
        $('#'+divId).append(getRuleHtml());
        affiliateUserAjaxSelect();
    });

    $(document).on('click', '.add_rule_group', function(event) {
        $('#rules').append(getRuleHtml(true));
        affiliateUserAjaxSelect();
    });

    $(document).on('click', '.delete_rule', function(event) {
        $(this).parent().parent().remove();
    });

    $(document).on('click', '.remove_rule_group', function(event) {
        $(this).parent().parent().parent().parent().parent().remove();
    });

    function addMultilevelOption(totalLevel, divId, commission)
    {
        let txt = ``;
        if (totalLevel > 1) {
            txt = `<label class="form-label mt-2">${jsLang('Tier-wise commission distribution')}</label><div class="row">`;
            let commissionType = $('#commission_type').val();
            for (let i = 0; i < totalLevel ; i++){
                txt += `<label class="col-sm-1 control-label ${i != 0 && i != 1 ? 'mt-2' : ''}" for="inputEmail3">T${i + 1}</label>
                <div class="col-sm-5 ${i != 0 && i != 1 ? 'mt-2' : ''}">
                   <input type="number" value="${i == 0 ? commission : ''}" ${i == 0 ? 'readonly' : ''} class="form-control inputFieldDesign tier" name="level_commission[T${i + 1}]">
                </div>
            `;
            };

            txt += `
              </div>
             <div class="col-sm-6 mt-4">
                <label class="form-label" >${jsLang('Total commissions')} <span id="totalCommission">${commissionType == 'flat' ? commission + currencySymbol : commission + '%'}</span></label>
             </div>
          `;
        }

        $(divId).html(txt);
    }

    function affiliateUserAjaxSelect()
    {
        $(".affiliate_user").select2({
            ajax: {
                url: SITE_URL + '/affiliate/find-affiliate-user-in-ajax',
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
            placeholder: jsLang("Search for an affiliate user."),
            minimumInputLength: 3,
        });
    }

    function getRuleHtml(group = false)
    {
        let html = ``;
        let customRuleId = 'custom_rule_' +Date.now();
        if (group) {
            ruleGroupCount++;
            html += `<div><br><div class="bg-gray p-3"><div class="row">
                        <label class="col-sm-4 small mt-2">${ jsLang("This group is a 'pass' when") }</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="rule_groups[${ruleGroupCount}][match_type]">
                                <option value="AND">${ jsLang('all') }</option>
                                <option value="OR">${ jsLang('at least one') }</option>
                            </select>
                        </div>
                        <label class="col-sm-4 small mt-2">${ jsLang('of the following rules are true.') }</label>
                    </div><div data-cid = ${customRuleId}><div id="${ customRuleId }">`;
        }
        html += `<div class="row mt-2 custom_rule_div">
                   <div class="col-sm-3 mt-2">
                        <select class="form-control rule_name" name="rule_groups[${group == true ? ruleGroupCount : existsGroupNumber}][rules_${ruleCount}][name]">
                            <option value="affiliate_user">${ jsLang('Affiliate') }</option>
                            <option value="affiliate_tag">${ jsLang('Affiliate Tag') }</option>
                            <option value="package">${ jsLang('Package') }</option>
                            <option value="credit">${ jsLang('Credit') }</option>
                        </select>
                    </div>
                    <div class="col-sm-2 mt-2 condition">
                        <select class="form-control" name="rule_groups[${group == true ? ruleGroupCount : existsGroupNumber}][rules_${ruleCount}][condition]">
                            <option value="any">${ jsLang('any of') }</option>
                            <option value="none">${ jsLang('none of') }</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mt-2 rule_value_div">
                        <select class="form-control rule_value affiliate_user sl_common_bx" name="rule_groups[rules_${ruleCount}][value][]" multiple id="${ 'rule_value_div_' +Date.now() }" required oninvalid="this.setCustomValidity('${ jsLang('This field is required.') }')">

                        </select>
                    </div>
                    <div class="col-sm-1 mt-2 mt-3 ${group == true ? 'display_none' : ''}">
                        <span class="text-dark cursor_pointer action-btn d-flex justify-content-center delete_rule" title="Delete Rule">
                            <i class="fa fa-trash"></i>
                        </span>
                    </div>
                </div>`;

        if (group) {
            html += `</div><div class="row mt-2">
                        <div class="col-sm-4">
                            <button type="button" class="small btn btn-default btn-sm add_rule" data-groupNumber = ${ruleGroupCount}><i class="fa fa-plus-circle" aria-hidden="true"></i>${ jsLang('Add a rule') }</button>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="small btn btn-default btn-sm float-right remove_rule_group"><i class="fa fa-minus-circle" aria-hidden="true"></i>${ jsLang('Remove group') }</button>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="small btn btn-default btn-sm float-right add_rule_group"><i class="fas fa-folder-open" aria-hidden="true"></i>${ jsLang('Add a group') }</button>
                        </div>
                    </div></div></div></div>`;
        }
        ruleCount++;

        return html;
    }
}
