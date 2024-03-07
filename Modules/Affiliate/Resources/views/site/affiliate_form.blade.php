<div class="textarea-render" id="fb-render">

</div>

<script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/jquery-formbuilder/form-render.min.js') }}" defer></script>
<script type="text/javascript">
    window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
</script>
<script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/render-form.min.js') }}" defer></script>

