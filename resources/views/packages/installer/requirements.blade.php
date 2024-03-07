@extends('packages.installer.layout')

@section('content')
  <div class="card darken-1">
        <div class="card-content black-text">
            <div class="center-align">
                <p class="card-title">{{ __("Server Requirements") }}</p>
                <hr>
            </div>
            @php $i=0; $disableRequirement = []; @endphp
            @foreach ($requirements['requirements'] as $type => $requirement)
               <ul class="collection with-header">
                  <div class="row collection-item font-bold font-16">
                      <div class="col s4 pl-0">
                        {{ __('PHP') }}
                      </div>
                      @if($type == 'php')
                        <div class="col s4">
                          {{ __("(version :x required)", ['x' => 8.1]) }}
                        </div>
                        <div class="col s4 pr-0">
                            {{ __("Current") }}({{ $phpSupportInfo['current'] }})
                            @if($phpSupportInfo['supported'])
                              <i class="material-icons secondary-content green-text text-accent-4">check_circle</i>
                            @else
                              <i class="material-icons secondary-content red-text text-accent-4">cancel</i>
                            @endif
                        </div>
                      @endif
                  </div>
                  <li class="collection-item">
                    @foreach ($requirements['requirements'][$type] as $extention => $enabled)
                      <div class="row">
                          <div class="left">
                            {{ ucfirst($extention) }}
                          </div>
                          <div class="right">
                              @if($enabled)
                                <i class="material-icons green-text text-accent-4">check_circle</i>
                                @else
                                @php $disableRequirement[$i] = $extention;$i++;  @endphp
                                <i class="material-icons red-text text-accent-4">cancel</i>
                              @endif
                          </div>
                      </div>
                    @endforeach
                  </li>
               </ul>
            @endforeach
        </div>

        <div class="card-action">
            <div class="row">
               <div class="left">
                  <a class="btn waves-effect blue waves-light" href="{{ url('/install') }}">
                      {{ __('Back') }}
                      <i class="material-icons left">arrow_back</i>
                  </a>
                </div>
                @if ( isset($requirements['errors']) && $phpSupportInfo['supported'] )
                  <div class="right">
                    <a class="btn waves-effect blue waves-light" onclick="errorMessageFunction()" readonly>
                        {{ __('Check') }}
                        <i class="material-icons right">send</i>
                    </a>
                  </div>
                @else
                  <div class="right">
                    <a class="btn waves-effect blue waves-light" href="{{ url('install/permissions') }}">
                        {{ __('Check permissions') }}
                        <i class="material-icons right">send</i>
                    </a>
                  </div>
                @endif
            </div>
        </div>
        
        <div id="snackbar">
          <span>
          @foreach ($disableRequirement as $disableReq)
          {!! __(':x is not installed.', ['x' => '<b>' . ucfirst($disableReq) . '</b>']) !!}<br>
          @endforeach
          </span>
        </div>
        
  </div>
  <script src="{{ asset('public/dist/js/installer.min.js') }}"></script>

@endsection
