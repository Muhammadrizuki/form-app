<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Entries</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        td, th{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Form Entries</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>LAB</th>
                    <th>App Title</th>
                    <th>Theme</th>
                    <th>API Link</th>
                    <th>GitHub Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formEntries as $formEntry)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $formEntry->nama }}</td>
                    <td>{{ $formEntry->nim }}</td>
                    <td>{{ $formEntry->lab }}</td>
                    <td>{{ $formEntry->judul }}</td>
                    <td>{{ $formEntry->tema }}</td>
                    <td class="center"><a href="{{ $formEntry->api_link }}" target="_blank">link</a></td>
                    <td class="center"><a href="{{ $formEntry->github_link }}" target="_blank">link</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
