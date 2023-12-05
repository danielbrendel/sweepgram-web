<div class="page-content">
	<div class="page-header">
		<img src="{{ asset('img/logo.png') }}" alt="Logo"/>

		<h1>{{ env('APP_NAME') }}</h1>

		<h2>{{ env('APP_DESCRIPTION') }}</h2>
	</div>

	<div class="page-info page-info-error is-hidden"></div>

	<div class="page-form">
		<div class="file has-name is-boxed is-link is-centered">
			<label class="file-label full-width">
				<input class="file-input" type="file" accept=".zip" onchange="window.vue.submitArchive(document.querySelector('.page-data'), 'file-cta', this);">
				<span class="file-cta" id="file-cta">
					<span class="file-icon">
						<i class="fas fa-upload"></i>
					</span>
					<span class="file-label" id="file-label">
						Choose a file…
					</span>
				</span>
			</label>
		</div>
	</div>

	<div class="page-data"></div>

	<div class="page-instructions">
		<h2><i class="fas fa-caret-square-right"></i> How does it work?</h2>

		<ol>
			<li>Go to your <strong>profile</strong> and then to <strong>Settings and privacy</strong></li>
			<li>Switch to <strong>Accounts Center</strong> and then to <strong>Your information and permissions</strong>
				<ol>
					<li>Go to <strong>Download your information</strong></li>
					<li>Hit <strong>Request a download</strong></li>
					<li>Hit <strong>Select types of information</strong></li>
					<li>Select <strong>Followers and following</strong> and hit <strong>Next</strong></li>
					<li>Select format <strong>JSON</strong> and date range <strong>All time</strong></li>
					<li>Finally hit <strong>Submit request</strong></li>
				</ol>
			</li>
			
			<li>Instagram will inform you when your download is ready</li>
			<li>You can then download the archive and submit it here!</li>
		</ol>
	</div>
</div>
