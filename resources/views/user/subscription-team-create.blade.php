@extends('layouts.user_master')
@section('page_title', __('Team Members'))
@section('content')
<div class="w-[68.9%] 7xl:w-[83.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF h-screen">
    <div class="xl:flex justify-between subscription-main md:overflow-auto sidebar-scrollbar h-screen">
        @include('user.includes.account-sidebar')
        <div class="grow xl:pl-6 px-5 xl:pt-[74px] md:pt-5 pt-[74px] pb-24 dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar 8xl:pr-[84px] main-profile-content xl:w-1/2">
            <div class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden pb-4">
                <a class="profile-back cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <span>{{ __('Team Members') }}</span>
            </div>

            <div>
                
                <p class="font-semibold text-color-14 dark:text-white text-20 pb-3 pt-1.5">{{ __('Team Members')}}
                    <a href="{{ route('user.subscription.teamCreate') }}" class="btn btn-outline-primary mb-0 custom-btn-small float-right">
                        <span class="fa fa-plus"> &nbsp;</span>{{ __('Add User') }}
                    </a>
                </p>
                <!-- <a href="{{ route('users.create') }}" class="btn btn-outline-primary mb-0 custom-btn-small">
                    <span class="fa fa-plus"> &nbsp;</span>{{ __('Add User') }}
                </a> -->
                <!-- <div class="card-header d-md-flex justify-content-between align-items-center">
                     <h5> <a href="{{ Route::current()->getName() == "users.customer" ? route('users.customer').'?role=3' : route('users.index') }}">{{ Route::current()->getName() == "users.customer" ?  __('Customers') : __('Users') }}</a> </h5>
                    <div class="d-md-flex mt-2 mt-md-0 justify-content-end align-items-center">
                        

                        <button class="btn btn-outline-primary custom-btn-small mb-0 collapsed filterbtn me-0" type="button"
                            data-bs-toggle="collapse" data-bs-target="#filterPanel" aria-expanded="true"
                            aria-controls="filterPanel"><span class="fas fa-filter me-1"></span>{{ __('Filter') }}</button>
                    </div>
                </div> -->



                <div class="border-b border-color-DF dark:border-[#474746]"></div>
            </div>
            <div class="bg-white dark:bg-[#292929] rounded-xl image-list-table border border-color-DF dark:border-color-47 mt-[22px] xl:w-[430px] 3xl:w-[600px] 4xl:w-[645px] 5xl:w-full bill-table">
                <div class="flex flex-col">
                    <div class="rounded-xl p-3 overflow-x-auto overflow-y-hidden">
                        <!-- user team create form start -->
                        <div class="card-block table-border-style">
                            <div class="row form-tabs">
                                <form action="{{ route('users.store') }}" method="post" id="userAdd"
                                    class="form-horizontal col-sm-12" enctype="multipart/form-data"
                                    onsubmit="return passwordValidation()">
                                    @csrf
                                    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-uppercase font-bold" id="home-tab" data-bs-toggle="tab" href="#home"
                                                role="tab" aria-controls="home"
                                                aria-selected="true">{{ __(':x Information', ['x' => __('User')]) }}</a>
                                        </li>
                                    </ul> -->
                                    <div class="col-sm-12 tab-content form-edit-con" id="myTabContent">
                                        <div class="tab-pane fade show active form-con" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <div class="form-group row">
                                                        <label for="name" class="control-label require ps-3">{{ __('Name') }}
                                                        </label>
                                                        <div class="col-sm-12">
                                                            <input type="text" placeholder="{{ __('Name') }}"
                                                                class="form-control form-width inputFieldDesign" id="name"
                                                                name="name" required minlength="3" value="{{ old('name') }}"
                                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"
                                                                data-min-length="{{ __(':x should contain at least :y characters.', ['x' => __('Name'), 'y' => 3]) }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email"
                                                            class="control-label require ps-3">{{ __('Email') }}</label>
                                                        <div class="col-sm-12">
                                                            <input type="email"
                                                                class="form-control form-width inputFieldDesign bg-white" id="email"
                                                                name="email" value="{{ old('email') }}"
                                                                placeholder="{{ __('Email') }}" required
                                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"
                                                                data-type-mismatch="{{ __('Enter a valid :x.', ['x' => strtolower(__('Email'))]) }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password"
                                                            class="col-sm-2 control-label require">{{ __('Password') }}</label>
                                                        <div class="col-sm-12">
                                                            <div>
                                                                <input type="password"
                                                                class="form-control password-validation form-width inputFieldDesign"
                                                                id="password" name="password" placeholder="{{ __('Password') }}"
                                                                value="{{ old('password') }}" required minlength="5"
                                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"
                                                                data-min-length="{{ __(':x should contain at least :y characters.', ['x' => __('Password'), 'y' => 5]) }}">
                                                            </div>
                                                            
                                                            <span class="password-validation-error mt-1 d-block"></span>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="form-group row">
                                                        <label for="role_id"
                                                            class="col-sm-2 control-label require">{{ __('Role') }}</label>
                                                        <div class="col-sm-12">
                                                            
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label for="Status" class="control-label ps-3">{{ __('Status') }}</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control select2-hide-search inputFieldDesign"
                                                                name="status" id="status">
                                                                <option value="Pending"
                                                                    {{ old('status') == 'Pending' || preference('user_default_signup_status') == 'Pending' ? 'selected' : '' }}>
                                                                    {{ __('Pending') }}</option>
                                                                <option value="Active"
                                                                    {{ old('status') == 'Active' || preference('user_default_signup_status') == 'Active' ? 'selected' : '' }}>
                                                                    {{ __('Active') }}</option>
                                                                <option value="Inactive"
                                                                    {{ old('status') == 'Inactive' || preference('user_default_signup_status') == 'Inactive' ? 'selected' : '' }}>
                                                                    {{ __('Inactive') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 control-label ps-3">{{ __('Picture') }}</label>
                                                        <div class="col-sm-12">
                                                            <div class="custom-file position-relative" data-val="single"
                                                                id="image-status">
                                                                <input class="custom-file-input form-control d-none inputFieldDesign"
                                                                    name="attachments" id="validatedCustomFile" accept="image/*">
                                                                <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                                    for="validatedCustomFile">{{ __('Upload image') }}</label>
                                                            </div>
                                                        </div>
                                                        <div id="img-container">
                                                            <!-- img will be shown here -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-0 my-md-3 d-felx mt-3">
                                                        <label class="control-label "></label>
                                                        <div>
                                                            <div class="checkbox checkbox-warning checkbox-fill d-inline">
                                                                <input type="checkbox" class="form-control" name="send_mail"
                                                                    id="checkbox-p-fill-1">
                                                                <label for="checkbox-p-fill-1"
                                                                    class="cr">{{ __('Send email to the user') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex btn-align mt-3 flex-wrap">
                                            <a href="{{ route('users.index') }}"
                                                class="btn custom-btn-cancel all-cancel-btn">{{ __('Cancel') }}</a>
                                            <button class="btn custom-btn-submit" type="submit" id="btnSubmit"><i
                                                    class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span
                                                    id="spinnerText">{{ __('Create') }}</span></button>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </form>
                            </div>
                        </div>
                        <!-- user team create form end -->
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>
@endsection
