<!doctype html>
<html lang="{{ getLocale() }}">
    <head>
        <meta charset="utf-8"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>{{ env('APP_NAME') }}</title>

		<link rel="icon" type="image/png" href="{{ asset('logo.png') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}"/>

		@if (env('APP_DEBUG'))
		<script src="{{ asset('js/vue.js') }}"></script>
		@else
		<script src="{{ asset('js/vue.min.js') }}"></script>
		@endif
		<script src="{{ asset('js/fontawesome.js') }}"></script>
    </head>

    <body>
        <div id="app" class="page-main">
            <div class="container">
                <div class="columns">
                    <div class="column is-2"></div>

                    <div class="column is-8">
                        {%content%}
                    </div>

                    <div class="column is-2"></div>
                </div>
            </div>

            <div class="page-footer">
                <div class="columns">
                    <div class="column is-3"></div>

                    <div class="column is-3">
                        <div class="is-margin-bottom-10">&copy; {{ date('Y') }} by {{ env('APP_AUTHOR') }}.</div>

                        <div>This tool is made in the hope that it is useful. We do not guarantee that the results are correct. Please <a href="mailto:{{ env('APP_CONTACT') }}">report</a> bugs and issues.</div>
                    </div>

                    <div class="column is-3 is-desktop-right">
                        <span>
                            <a href="https://github.com/danielbrendel">
                                <i class="fab fa-github fa-2x"></i>
                            </a>
                        </span>

                        <span>
                            <a href="https://www.youtube.com/channel/UCPETT7XPpvLHeUTZ-4l-K5w">
                                <i class="fab fa-youtube fa-2x"></i>
                            </a>
                        </span>

                        <span>
                            <a href="https://www.linkedin.com/in/daniel-brendel-88375a248">
                                <i class="fab fa-linkedin fa-2x"></i>
                            </a>
                        </span>

                        <span>
                            <a href="https://mastodon.social/@dbdev">
                                <i class="fab fa-mastodon fa-2x"></i>
                            </a>
                        </span>
                    </div>

                    <div class="column is-3"></div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js', true) }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            });
        </script>
    </body>
</html>