<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
	<!--begin::Toolbar container-->
	<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
		@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_page-title')
		<div class="app-navbar-item ms-1 ms-md-3 float-end" id="kt_header_user_menu_toggle">
			<!--begin::Menu wrapper-->
			<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
				@if(Auth::user()->profile_photo_url)
				<img src="{{ \Auth::user()->profile_photo_url }}" alt="user" />
				@else
				<div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
					{{ substr(Auth::user()->name, 0, 1) }}
				</div>
				@endif
			</div>
			@include('partials/menus/_user-account-menu')
			<!--end::Menu wrapper-->
		</div>
		<!--begin::Actions-->
		<!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
		</div> -->
		<!--end::Actions-->
	</div>
	<!--end::Toolbar container-->
</div>
<!--end::Toolbar-->