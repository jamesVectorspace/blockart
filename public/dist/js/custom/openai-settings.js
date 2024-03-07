
function checkAndSetValidation(inputId, apiKey) {
    const $input = $(`#${inputId}`);

    if ($input.val() === "" && apiKey !== "") {
        $input.prop('required', true);
        $input.attr('oninvalid', "this.setCustomValidity('{{ __('This field is required.') }}')");
    } else {
        $input.prop('required', false);
        $input.attr('oninvalid', "");
    }
}

$(document).on("keyup", "#aiSettings", function () {
    checkAndSetValidation('openai_key', openai_key);
    checkAndSetValidation('stablediffusion_key', stable_diffusion_key);
    checkAndSetValidation('googleApi_key', googleApi_key);
    checkAndSetValidation('clipdropApi_key', clipdropApi_key);
});

