  <div class="card card-info shadow-none" id="nav">
      <div class="card-header p-t-20 border-bottom mb-2">
          <h5>{{ __('Settings') }}</h5>
      </div>
      <ul class="nav nav-pills nav-stacked" id="mcap-tab" role="tablist">

          <li class="nav-item">
              <a class="nav-link h-lightblue text-left {{ is_active_database_backup_sidebar('dropbox_setting.create') ? 'active' : '' }}"
                  href="{{ route('dropbox_setting.create') }}" id="s" role="tab" aria-controls="mcap-default"
                  aria-selected="true">{{ __('Dropbox') }}</a>
          </li>

          <li class="nav-item">
              <a class="nav-link h-lightblue text-left {{ is_active_database_backup_sidebar('google_drive_setting.create') ? 'active' : '' }}"
                  href="{{ route('google_drive_setting.create') }}" id="s" role="tab"
                  aria-controls="mcap-default" aria-selected="true">{{ __('Google Drive') }}</a>
          </li>

          <li class="nav-item">
              <a class="nav-link h-lightblue text-left {{ is_active_database_backup_sidebar('database.automated.backup') ? 'active' : '' }}"
                  href="{{ route('database.automated.backup') }}" id="s" role="tab"
                  aria-controls="mcap-default" aria-selected="true">{{ __('Auto backup') }}</a>
          </li>

      </ul>
  </div>
