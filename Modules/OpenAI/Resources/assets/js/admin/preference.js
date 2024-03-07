'use strict';

$(function () {
    var pagination = ['v-pills-setup-tab', 'v-pills-document-tab', 'v-pills-code-tab', 'v-pills-image-tab', 'v-pills-openai-image-tab', 'v-pills-stable-diffusion-image-tab', 'v-pills-bad-word-tab', 'v-pills-voiceover-tab', 'v-pills-speech-tab', 'v-pills-access-tab', 'v-pills-long-article-tab'];

    if (typeof dynamic_page !== 'undefined') {
        pagination = ['v-pills-setup-tab'];
        for (const value of dynamic_page) {
            pagination.push(`v-pills-${value}-tab`)
        }
    }
    
    function tabTitle(id) {
        var title = $('#' + id).attr('data-id');
        $('#theme-title').html(title);
    }

    $(document).on("click", '.tab-name', function () {
        var id = $(this).attr('data-id');

        $('#theme-title').html(id);
    });

    $(".package-submit-button").on("click", function () {
        setTimeout(() => {
            for (const data of pagination) {
                if ($('#' + data.replace('-tab', '')).find(".error").length) {
                    var target = $('#' + data.replace('-tab', '')).attr("aria-labelledby");
                    $('#' + target).tab('show');
                    tabTitle(target);
                    break;
                }
            }
        }, 100);
    });

    $(document).on('change', '#stable_diffusion_engine', function () {
        let parent = $('#stable_diffusion_engine').val();
        setResolution('#stable_diffusion', parent);
    });

    $(document).on('change', '#openai_engine', function () {
        let parent = $('#openai_engine').val();
        setResolution('#openai', parent);
        setVarient('#openai', parent)
    });

    function setResolution(model, parent) {
        var resolutions = openAI.size[parent]; 
        $(model + '_resulation').empty();
        
        for (const key in resolutions) {
            $(model + '_resulation').append(`
                <option value="${key}" selected>${key}</option>
            `)
        }
    }

    function setVarient(model, value) {
        $(model + '_variant').empty();
        for (const key in openAIPreferenceSizes) {
            if (value == 'dall-e-3') {
                $(model + '_variant').append(`
                <option value="${openAIPreferenceSizes[1]}" selected>${openAIPreferenceSizes[1]}</option>
                `)
                return false;
            } else {
                $(model + '_variant').append(`
                    <option value="${key}" selected>${key}</option>
                `)
            }
           
        }
    }

    $(document).ready(function(){
        $('.conditional').ifs();
    });

    $(document).on("click", '.tab-name', function () {
        setTimeout(() => {
            $('.nav-link.active').closest('ul').addClass('show').siblings('a').removeClass('collapses').attr('aria-expanded', true);
        }, 100);
        var id = $(this).attr('data-id');
        $('#theme-title').html(id);
        $('.tab-pane').removeClass('show active')
        $(`.tab-pane[aria-labelledby="${$(this).attr('id')}"`).addClass('show active')

        $('.tab-name').removeClass('active').attr('aria-selected', false);
        $(this).addClass('active').attr('aria-selected', true);
    });

    $(document).on('click', '.nav-list .nav-link', function(e) {
        console.log(e);
        var target = $(".tab-pane");
    
        $([document.documentElement, document.body]).animate(
            {
            scrollTop: $(target).offset().top - 350,
            },
            350
        );
    })
})


$('#frequency_penalty').on('input', function() {
    $('#frequency_penalty_value').text(this.value);
})

$('#presence_penalty').on('input', function() {
    $('#presence_penalty_value').text(this.value);
})

$( document ).ready(function() {
    $('#frequency_penalty_value').text($('#frequency_penalty').val());
    $('#presence_penalty_value').text($('#presence_penalty').val());
});