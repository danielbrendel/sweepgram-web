<div class="page-content">
	<div class="page-header">
		<img src="{{ asset('logo.png') }}" alt="Logo"/>

		<h1>{{ env('APP_NAME') }}</h1>

		<h2>The following users do not follow you back</h2>
	</div>

	<div class="page-data">
        @foreach ($list as $item)
            <a href="https://www.instagram.com/{{ $item }}/" target="_blank"><div class="page-data-item">{{ $item }}</div></a>
        @endforeach
    </div>

    <div class="page-action">
        <a class="button is-link" href="{{ url('/') }}">Go back</a>
    </div>
</div>
