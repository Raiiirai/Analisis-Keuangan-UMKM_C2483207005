<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title') - Keuangan UMKM</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            header {
                background-color: #263238;
                color: white;
                padding 20px;
            }

            header h2 {
                margin: 0 0 15px 0;
            }

            nav a {
                color: white;
                text-decoration: none;
                margin-right: 20px;
            }

            nav a:hover {
                text-decoration: underline;
            }

            main {
                width: 90%;
                max-width: 1100px;
                margin: 30px auto;
            }

            .card {
                background-color: white;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 6px;
                border: 1px solid #ddd;
            }

            .container-card {
                display: flex;
                gap: 15px;
                flex-wrap: wrap;
            }

            .summary {
                background-color: white;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 6px;
                flex: 1;
                min-width: 180px;
            }

            .summary h3 {
                margin-top: 0;
                color: #555;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                background-color: white;
            }

            th, td {
                padding: 12px;
                border: 1px solid #ddd;
                text-align: left;
            }

            th {
                background-color: #eeeeee;
            }

            a {
                color: #1565c0;
            }

            .button {
                display: inline-block;
                background-color: #263238;
                color: white;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 4px;
                margin: 5px 0;
            }

            .income {
                color: green;
            }

            .expense {
                color: red;
            }

            .profit {
                color: green;
            }

            .loss {
                color: red;
            }

            footer {
                text-align: center;
                padding: 20px;
                color: #777;
            }
    </style>
</head>

<body>

    <header>
        <h2>Catatan Keuangan UMKM</h2>

        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('transaksi.index') }}">Transaksi</a>
            <a href="{{ route('kategori.index') }}">Kategori</a>
            <a href="{{ route('laporan.index') }}">Laporan</a>
            <a href="{{ route('analisis') }}">Analisis</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Aplikasi Analisis Keuangan UMKM - Proyek Laravel</p>
    </footer>

</body>
</html>