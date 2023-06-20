<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
   <a href="{{ route('admin.setting.account') }}" class="btn text-white {{ Route::is('admin.setting.account') ? 'btn-primary' : 'btn-success' }} mb-2">
        <span class="d-none d-md-block">Account</span>
    </a>
    <a href="{{ route('admin.setting.basic') }}" class="btn text-white {{ Route::is('admin.setting.basic') ? 'btn-primary' : 'btn-success' }} mb-2">
        <span class="d-none d-md-block">Basic Setting</span>
    </a>
</div>
