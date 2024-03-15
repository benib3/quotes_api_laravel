<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 2px rgba(255, 4, 4, 0.267), 0 1px 2px 0 rgba(138, 2, 2, 0.699)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }
        .noise {

            background:
            radial-gradient(circle at -15% 15%, rgb(0, 0, 0),  rgba(206, 7, 7, 0.6) , rgba(0, 0, 0, 0.8)),
            url(https://grainy-gradients.vercel.app/noise.svg);

        }
        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #000000;
                background-color: rgba(45, 55, 72, var(--bg-opacity))

            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #000000;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #ff0000;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative noise flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-center sm:pt-0">
                <svg width="200" height="200" viewBox="0 0 600 600" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M530.986 284.507C530.986 430.186 419.16 547.887 281.69 547.887C144.22 547.887 32.3944 430.186 32.3944 284.507C32.3944 138.828 144.22 21.1267 281.69 21.1267C419.16 21.1267 530.986 138.828 530.986 284.507Z"
                        fill="white" stroke="black" stroke-width="8.4507" />
                    <line x1="105.018" y1="465.308" x2="474.032" y2="116.012" stroke="#0B0A0A"
                        stroke-width="14.0845" />
                    <line x1="88.1166" y1="451.224" x2="457.131" y2="101.928" stroke="#0B0A0A"
                        stroke-width="14.0845" />
                    <g filter="url(#filter0_d_6_9)">
                        <path
                            d="M102.75 376.141V340.46C104.359 339.745 105.701 338.582 106.774 336.972C108.026 335.184 108.831 333.843 109.188 332.948C109.725 331.518 109.993 329.997 109.993 328.388V210.346C109.993 208.379 109.725 206.769 109.188 205.517C108.652 204.265 107.668 202.655 106.237 200.688C104.985 198.542 103.197 196.753 100.872 195.323V161.788H223.206C236.62 161.788 248.066 166.08 257.545 174.665C267.024 183.25 271.764 194.16 271.764 207.395C271.764 221.703 270.691 231.987 268.545 238.247C265.146 248.262 258.35 255.148 248.156 258.904C247.082 259.262 246.546 260.335 246.546 262.123C246.546 263.733 246.993 264.717 247.887 265.074C259.513 271.513 267.382 279.561 271.496 289.219C274.715 296.91 276.325 308.625 276.325 324.364C276.325 339.029 272.39 351.012 264.52 360.313C255.578 370.865 243.058 376.141 226.962 376.141H102.75ZM204.427 222.955C204.427 217.768 203.353 213.208 201.207 209.273C199.061 205.159 195.842 203.103 191.549 203.103H180.282C178.672 203.103 177.509 203.818 176.794 205.249C176.436 205.964 176.258 206.769 176.258 207.663C176.258 208.915 176.258 209.899 176.258 210.614V235.564C176.258 236.995 176.258 238.068 176.258 238.783C176.258 241.108 176.526 242.629 177.062 243.344C177.957 244.417 179.298 244.954 181.087 244.954H192.891C197.183 244.954 200.313 242.539 202.28 237.71C203.711 234.133 204.427 229.215 204.427 222.955ZM206.841 308.803C206.841 302.723 205.768 297.536 203.622 293.243C200.939 287.699 197.004 284.927 191.818 284.927H180.55C178.761 284.927 177.599 285.642 177.062 287.073C176.705 287.789 176.526 289.13 176.526 291.097C176.526 293.422 176.526 295.211 176.526 296.463V321.412C176.347 324.811 176.258 327.136 176.258 328.388C176.258 329.997 176.526 331.249 177.062 332.144C177.778 333.038 179.209 333.485 181.355 333.485H193.159C198.167 333.485 201.833 330.802 204.158 325.437C205.947 321.323 206.841 315.779 206.841 308.803ZM297.237 376.141V340.46C298.847 339.745 300.188 338.582 301.261 336.972C302.513 335.184 303.318 333.843 303.676 332.948C304.212 331.518 304.481 329.997 304.481 328.388V210.346C304.481 208.379 304.212 206.769 303.676 205.517C303.139 204.265 302.155 202.655 300.725 200.688C299.473 198.542 297.684 196.753 295.359 195.323V161.788H417.693C431.107 161.788 442.553 166.08 452.032 174.665C461.512 183.25 466.251 194.16 466.251 207.395C466.251 221.703 465.178 231.987 463.032 238.247C459.634 248.262 452.837 255.148 442.643 258.904C441.57 259.262 441.033 260.335 441.033 262.123C441.033 263.733 441.48 264.717 442.375 265.074C454 271.513 461.869 279.561 465.983 289.219C469.202 296.91 470.812 308.625 470.812 324.364C470.812 339.029 466.877 351.012 459.008 360.313C450.065 370.865 437.546 376.141 421.449 376.141H297.237ZM398.914 222.955C398.914 217.768 397.841 213.208 395.694 209.273C393.548 205.159 390.329 203.103 386.037 203.103H374.769C373.159 203.103 371.997 203.818 371.281 205.249C370.924 205.964 370.745 206.769 370.745 207.663C370.745 208.915 370.745 209.899 370.745 210.614V235.564C370.745 236.995 370.745 238.068 370.745 238.783C370.745 241.108 371.013 242.629 371.55 243.344C372.444 244.417 373.785 244.954 375.574 244.954H387.378C391.67 244.954 394.8 242.539 396.768 237.71C398.198 234.133 398.914 229.215 398.914 222.955ZM401.328 308.803C401.328 302.723 400.255 297.536 398.109 293.243C395.426 287.699 391.491 284.927 386.305 284.927H375.037C373.249 284.927 372.086 285.642 371.55 287.073C371.192 287.789 371.013 289.13 371.013 291.097C371.013 293.422 371.013 295.211 371.013 296.463V321.412C370.834 324.811 370.745 327.136 370.745 328.388C370.745 329.997 371.013 331.249 371.55 332.144C372.265 333.038 373.696 333.485 375.842 333.485H387.646C392.654 333.485 396.32 330.802 398.645 325.437C400.434 321.323 401.328 315.779 401.328 308.803Z"
                            fill="black" />
                    </g>
                    <line x1="90.8731" y1="445.515" x2="454.461" y2="102.073" stroke="white"
                        stroke-width="13.9737" />
                    <defs>
                        <filter id="filter0_d_6_9" x="89.6043" y="161.788" width="392.475" height="236.888"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="11.2676" />
                            <feGaussianBlur stdDeviation="5.6338" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_6_9" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_6_9" result="shape" />
                        </filter>
                    </defs>
                </svg>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://benaminbambur.com"
                                    class="underline text-gray-900 dark:text-white">Portofolio</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                My personal portofolio website, where you can find my projects, blog posts, and more.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://www.researchgate.net/profile/Benamin-Bambur"
                                    class="underline text-gray-900 dark:text-white">Research gate</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                My research gate profile, where you can find my research papers and publications.
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</body>

</html>
