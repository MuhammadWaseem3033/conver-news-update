<div>
    {{-- <div class="text-center p-10">
        <h1 class="text-4xl font-bold text-gray-700">404 - Page Not Found</h1>
        <p class="text-lg text-gray-500 mt-4">Oops! The page you're looking for doesn't exist.</p>
        <a href="{{route('index')}}" class="mt-6 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
            Go Back to Home
        </a>
    </div>     --}}
    <div class="section">
        <h1 class="error">404</h1>
        <div class="page">Ooops!!! The page you are looking for is not found</div>
        <a class="back-home" href="{{ route('index') }}">Back To Home</a>
    </div>

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <style>
        h1,
        a {
            margin: 0;
            padding: 0;
            text-decoration: none;
        }

        .section {
            padding: 2rem 2rem;
            text-align: center;
            font-family: sans-serif;
            background-color: #E7FFFF;
        }

        .section .error {
            font-size: 150px;
            color: #ff6600;
            text-shadow:
                1px 1px 1px #ff6600,
                2px 2px 1px #ff6600,
                3px 3px 1px #ff6600,
                4px 4px 1px #ff6600,
                5px 5px 1px #ff6600,
                6px 6px 1px #ff6600,
                7px 7px 1px #ff6600,
                8px 8px 1px #00593E,
                25px 25px 8px rgba(63, 37, 37, 0.2);
        }

        .page {
            margin: 2rem 0;
            font-size: 20px;
            font-weight: 600;
            color: #444;
        }

        .back-home {
            display: inline-block;
            border: 2px solid #222;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            padding: 0.75rem 1rem 0.6rem;
            transition: all 0.2s linear;
            box-shadow: 0 15px 15px -11px rgba(0, 0, 0, 0.4);
            background: #222;
            border-radius: 6px;
        }

        .back-home:hover {
            background: #222;
            color: #ddd;
        }
    </style>
</div>
