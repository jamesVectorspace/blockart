@extends('affiliate::layouts.app')
@section('page_title', __('Affiliate Setting'))

@section('css')
    {{-- Select2  --}}
    <link rel="stylesheet" href="{{ asset('public/datta-able/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-settings-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Settings') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{ route('affiliate.settings') }}" method="post" class="form-horizontal" id="affiliate_setting_form">
                                @csrf
                                <div class="card-body p-0">

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Registration form') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <a href="{{ route('site.affiliate.form', $form->id) }}" class="control-label text-left">{{ __('Edit registration form') }}</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left"
                                               for="file_size">{{ __('Approval method') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <div class="checkbox checkbox-warning checkbox-fill d-block">
                                                <input type="hidden" name="automatic_approve" value="0">
                                                <input type="checkbox" name="automatic_approve" value="1"  @checked(preference('automatic_approve') == 1)  id="automatic_approve">
                                                <label class="cr" for="automatic_approve">{{ __('Automatically approve all submissions via Affiliate Registration Form - no manual review needed.') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Affiliate users roles') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <input type="hidden" name="affiliate_roles" value="">
                                            <select class="form-control js-example-basic-single form-height sl_common_bx select2" name="affiliate_roles[]" id="affiliate_roles" multiple>
                                                @php $affiliateRoles =  json_decode(preference('affiliate_roles'), true) @endphp
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @selected(is_array($affiliateRoles) && in_array($role->id, $affiliateRoles))>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-2">
                                                <span>{{ __('Users with these roles automatically become affiliates.') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Referral commission') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <a href="{{ route('commission.plan.index') }}" class="control-label text-left">{{ __('Store-wide Default Commission') }}</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Excluded packages') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <input type="hidden" name="exclude_packages" value="">
                                            <select class="form-control js-example-basic-single form-height sl_common_bx select-package" name="exclude_packages[]" id="exclude_packages" multiple>
                                                @foreach($excludePackages as $package)
                                                    <option value="{{ $package->id }}" selected >{{ $package->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-2">
                                                <span>{{ __('All package are eligible for affiliate commission by default. If you want to exclude some, list them here.') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Affiliate tags') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <a href="{{ route('tags.index') }}" class="control-label text-left">{{ __('Manage affiliate tags') }}</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Tracking param name') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <input class="form-control inputFieldDesign" type="text" name="track_param" id="track_param" value="{{ !is_null(preference('track_param')) ? preference('track_param') : '' }}">
                                            <div class="mt-2">
                                                <span>{{ __('Leaving this blank will use default value ref') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left"
                                               for="file_size">{{ __('Personalize affiliate identifier') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <div class="checkbox checkbox-warning checkbox-fill d-block">
                                                <input type="hidden" name="affiliate_identifier" value="0">
                                                <input type="checkbox" name="affiliate_identifier" value="1"  @checked(preference('affiliate_identifier') == 1)  id="affiliate_identifier">
                                                <label class="cr" for="affiliate_identifier">{{ __('Allow affiliates to use something other than {user_id} as referral identifier.') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Cookie duration (in days)') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <input class="form-control inputFieldDesign" type="number" name="cookie_duration" id="cookie_duration" value="{{ !is_null(preference('cookie_duration')) ? preference('cookie_duration') : '' }}">
                                            <div class="mt-2">
                                                <span>{{ __('Use 0 for session only referrals. Use 36500 for 100 year / lifetime referrals. If someone makes a purchase within these many days of their first referred visit, affiliate will be credited for the subscription.') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Lifetime commissions') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <div class="checkbox checkbox-warning checkbox-fill d-block">
                                                <input type="hidden" name="lifetime_commission" value="0">
                                                <input type="checkbox" name="lifetime_commission" value="1"  @checked(preference('lifetime_commission') == 1)  id="lifetime_commission">
                                                <label class="cr" for="lifetime_commission">{{ __('Allow affiliates to receive lifetime commissions') }}</label>
                                                <div class="mt-2">
                                                    <span>{{ __('Affiliates will receive commissions for every sale made by the same customer linked to this affiliate - without using referral link.)') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row lifetime_commission display_none">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Lifetime commissions exclude affiliates tags') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <input type="hidden" name="lifetime_exclude_tags" value="">
                                            <select class="form-control js-example-basic-single form-height sl_common_bx lifetime_exclude_tags" name="lifetime_exclude_tags[]" id="lifetime_exclude_tags" multiple>
                                                @php $affiliateTags = json_decode(preference('lifetime_exclude_tags'), true) @endphp
                                                @foreach($affiliate_tags as $tag)
                                                    <option value="{{ $tag->id }}" @selected(is_array($affiliateTags) && in_array($tag->id, $affiliateTags))>{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-2">
                                                <span>{{ __('Exclude the affiliates either by individual affiliate tags to not give them lifetime commissions.') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row lifetime_commission display_none">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Lifetime commissions exclude affiliates user') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <input type="hidden" name="lifetime_exclude_user" value="">
                                            <select class="form-control js-example-basic-single form-height sl_common_bx select_user" name="lifetime_exclude_user[]" id="lifetime_exclude_user" multiple>
                                                @foreach($excludeUsers as $user)
                                                    <option value="{{ $user->id }}" selected >{{ $user->user?->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="mt-2">
                                                <span>{{ __('Exclude the affiliates either by individual affiliates user to not give them lifetime commissions.') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Affiliate self-refer') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <div class="checkbox checkbox-warning checkbox-fill d-block">
                                                <input type="hidden" name="self_refer" value="0">
                                                <input type="checkbox" name="self_refer" value="1"  @checked(preference('self_refer') == 1)  id="self_refer">
                                                <label class="cr" for="self_refer">{{ __('Allow affiliates to earn commissions on their own orders') }}</label>
                                                <div class="mt-2">
                                                    <span>{{ __('Disabling this will not record a commission if an affiliate uses their own referral link during orders)') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer p-0">
                                        <div class="form-group row">
                                            <label for="btn_save" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn form-submit custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}"
                                                        id="footer-btn">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/setting.min.js') }}"></script>
@endsection
