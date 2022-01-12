<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Elte Matches</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @includeIf('components.navbar')

        <main class="py-4 col-lg-8 mx-auto p-3 py-md-5">
            <section>
                <h1>ELTE Football Matches Board</h1>
                <p class="fs-5 col-md-8">You can find match resultes, scheduled matches, comments on teams and many
                    more. Enjoy using it!</p>

                <div class="mb-5">
                    <a href="/docs/5.0/examples/" class="btn btn-primary btn-lg px-4">Download examples</a>
                </div>

                <hr class="col-3 col-md-2 mb-5">

                <div class="row g-5">
                    <div class="col-md-6">
                        <h2>Starter projects</h2>
                        <p>Ready to beyond the starter template? Check out these open source projects that you can
                            quickly duplicate to a new GitHub repository.</p>
                        <ul class="icon-list">
                            <li><a href="https://github.com/twbs/bootstrap-npm-starter" rel="noopener"
                                    target="_blank">Bootstrap npm starter</a></li>
                            <li class="text-muted">Bootstrap Parcel starter (coming soon!)</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h2>Guides</h2>
                        <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
                        <ul class="icon-list">
                            <li><a href="/docs/5.0/getting-started/introduction/">Bootstrap quick start guide</a></li>
                            <li><a href="/docs/5.0/getting-started/webpack/">Bootstrap Webpack guide</a></li>
                            <li><a href="/docs/5.0/getting-started/parcel/">Bootstrap Parcel guide</a></li>
                            <li><a href="/docs/5.0/getting-started/build-tools/">Contributing to Bootstrap</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="" alt="" class="card-img-top">

                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
</body>

</html>
