<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('sites/img/logo.png') }}"/>
    <style amp-boilerplate>body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }</style>
    <noscript>
        <style amp-boilerplate>body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }</style>
    </noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-video"
            src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
    <script async custom-element="amp-story"
            src="https://cdn.ampproject.org/v0/amp-story-1.0.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400" rel="stylesheet">
    <style amp-custom>
        amp-story {
            font-family: 'Oswald', sans-serif;
            color: #fff;
        }

        amp-story-page {
            background-color: #000;
        }

        h1 {
            font-weight: bold;
            font-size: 2.875em;
            font-weight: normal;
            line-height: 1.174;
        }

        p {
            font-weight: normal;
            font-size: 1.3em;
            line-height: 1.5em;
            color: #fff;
        }

        q {
            font-weight: 300;
            font-size: 1.1em;
        }

        amp-story-grid-layer.bottom {
            align-content: end;
        }

        amp-story-grid-layer.noedge {
            padding: 0px;
        }

        amp-story-grid-layer.center-text {
            align-content: center;
        }

        .wrapper {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 50% 50%;
        }

        .banner-text {
            text-align: center;
            background-color: #000;
            line-height: 2em;
        }
    </style>
</head>
<body>
<!-- Cover page -->
<amp-story standalone
           title=""
           publisher="Turkey advisors"
           publisher-logo-src="{{ asset('sites/img/logo.png') }}"
           poster-portrait-src="assets/cover.jpg">
    @foreach($intaStoryImages as $key => $instStory)
        <amp-story-page id="{{ $loop->first ? 'cover' : 'page' . $key }}">
            <amp-story-grid-layer template="fill">
                <amp-img src="{{ pageImage($instStory->photo_file) }}"
                         width="720" height="1280"
                         layout="responsive">
                </amp-img>
            </amp-story-grid-layer>
        </amp-story-page>
    @endforeach
</amp-story>
</body>
</html>
