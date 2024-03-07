@if (count($errors) > 0)
    <div class="alert inline-block relative flash-message z-[99999]">
        <div
            class="font-Figtree text-white text-16 font-medium p-5 bg-[#DF2F2F] rounded-xl validation-modal-box-shadow w-max flex gap-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="flex gap-3 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11"
                            fill="none">
                            <path
                                d="M13.88 0.296631C14.2755 0.692139 14.2755 1.33444 13.88 1.72995L5.77995 9.82995C5.38444 10.2255 4.74214 10.2255 4.34663 9.82995L0.296631 5.77995C-0.098877 5.38444 -0.098877 4.74214 0.296631 4.34663C0.692139 3.95112 1.33444 3.95112 1.72995 4.34663L5.06487 7.67839L12.4498 0.296631C12.8453 -0.098877 13.4876 -0.098877 13.8831 0.296631H13.88Z"
                                fill="white" />
                        </svg>
                        <p class="reset-error-msg w-[319px] text-left">{{ $error }}</p>
                    </li>
                @endforeach
            </ul>
            <svg class="modal-btn-close cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.71489 4.40727C4.05284 4.06932 4.60078 4.06932 4.93873 4.40727L8.65373 8.12228L12.3687 4.40727C12.7067 4.06932 13.2546 4.06932 13.5926 4.40727C13.9305 4.74523 13.9305 5.29316 13.5926 5.63111L9.87757 9.34612L13.5926 13.0611C13.9305 13.3991 13.9305 13.947 13.5926 14.285C13.2546 14.6229 12.7067 14.6229 12.3687 14.285L8.65373 10.57L4.93873 14.285C4.60078 14.6229 4.05284 14.6229 3.71489 14.285C3.37694 13.947 3.37694 13.3991 3.71489 13.0611L7.42989 9.34612L3.71489 5.63111C3.37694 5.29316 3.37694 4.74523 3.71489 4.40727Z"
                    fill="white" />
            </svg>

        </div>

    </div>
@endif

@foreach (['success', 'danger', 'fail', 'warning', 'info'] as $msg)
    @if ($message = Session::get($msg))
        <div class="alert-reset inline-block flash-message">
            <div class="alert-{{ $msg == 'fail' ? 'danger' : $msg }} font-Figtree text-white text-16 font-medium p-5 bg-[#763CD4] rounded-xl validation-modal-box-shadow w-max flex gap-12">

                <div class="flex gap-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11"
                        fill="none">
                        <path
                            d="M13.88 0.296631C14.2755 0.692139 14.2755 1.33444 13.88 1.72995L5.77995 9.82995C5.38444 10.2255 4.74214 10.2255 4.34663 9.82995L0.296631 5.77995C-0.098877 5.38444 -0.098877 4.74214 0.296631 4.34663C0.692139 3.95112 1.33444 3.95112 1.72995 4.34663L5.06487 7.67839L12.4498 0.296631C12.8453 -0.098877 13.4876 -0.098877 13.8831 0.296631H13.88Z"
                            fill="white" />
                    </svg>
                    <p class="reset-success-msg w-[319px] text-left">{{ $message }}</p>
                </div>
                <svg class="modal-btn-close cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.71489 4.40727C4.05284 4.06932 4.60078 4.06932 4.93873 4.40727L8.65373 8.12228L12.3687 4.40727C12.7067 4.06932 13.2546 4.06932 13.5926 4.40727C13.9305 4.74523 13.9305 5.29316 13.5926 5.63111L9.87757 9.34612L13.5926 13.0611C13.9305 13.3991 13.9305 13.947 13.5926 14.285C13.2546 14.6229 12.7067 14.6229 12.3687 14.285L8.65373 10.57L4.93873 14.285C4.60078 14.6229 4.05284 14.6229 3.71489 14.285C3.37694 13.947 3.37694 13.3991 3.71489 13.0611L7.42989 9.34612L3.71489 5.63111C3.37694 5.29316 3.37694 4.74523 3.71489 4.40727Z"
                        fill="white" />
                </svg>

            </div>
        </div>
        @break
    @endif
@endforeach
