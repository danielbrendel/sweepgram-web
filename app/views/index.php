<div class="page-content">
	<div class="page-header">
		<img src="{{ asset('logo.png') }}" alt="Logo"/>

		<h1>{{ env('APP_NAME') }}</h1>

		<h2>Check who does not follow you back on Instagram!</h2>
	</div>

	@if (FlashMessage::hasMsg('error'))
	<div class="page-info page-info-error">
		{{ FlashMessage::getMsg('error') }}
	</div>
	@elseif (FlashMessage::hasMsg('success'))
	<div class="page-info page-info-success">
		{{ FlashMessage::getMsg('success') }}
	</div>
	@endif

	<div class="page-form">
		<form method="POST" action="{{ url('/nonfollowers') }}" id="archive-upload" enctype="multipart/form-data">
			@csrf

			<div class="file has-name is-boxed is-link is-centered">
				<label class="file-label full-width">
					<input class="file-input" type="file" name="archive" accept=".zip" onchange="window.vue.submitArchive('archive-upload', 'file-cta', 'selected-file', this);">
					<span class="file-cta" id="file-cta">
						<span class="file-icon">
							<i class="fas fa-upload"></i>
						</span>
						<span class="file-label" id="file-label">
							Choose a file…
						</span>
					</span>
					<span class="file-name is-centered" id="selected-file">
						No file selected...
					</span>
				</label>
			</div>
		</form>
	</div>

	<div class="page-instructions">
		<h2>How does it work?</h2>

		<ul>
			<li>Go to the request data section on Instagram</li>
			<li>Only select followers and followings as data</li>
			<li>Choose all time history</li>
			<li>Select JSON as data type</li>
			<li>Perform the request</li>
			<li>Wait until Instagram informs you that your data is ready</li>
			<li>Now download the ZIP-Archive from Instagram</li>
			<li>Submit your archive here and see who does not follow you back!</li>
		</ul>
	</div>
</div>
