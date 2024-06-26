<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #343a40;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 10px;
            color: #343a40;
        }
        .form-reminder{
            text-align: center;
            margin-bottom: 20px;
            color: #c02626;
        }
        .btn-primary {
            background-color: #343a40;
            border-color: #343a40;
            
        }
        .btn-primary:hover, .btn-primary:active {
            background-color: #fff;
            border-color: #343a40;
            color: #000;
        }
        .nav-link{
            text-align: center;
        }
        .form-credit{
            text-align: center;
            margin-top: 20px;
            border-color: #343a40;
        }
    </style>
     <script>
        function validateForm(event) {
            if (!confirm("WARNING! After submiting you can't change any data you already submited, are you sure want to submit?")) {
                return false; // Cancels the form submission
            }
            return true; // Allows the form submission
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="form-title">MD Final Project Form</h1>
        <h5 class="form-reminder">*Each NIM can only submit once</h5>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('form.store') }}" method="POST" onsubmit="return validateForm(event)">
            @csrf
            <div class="form-group">
                <label for="nama">Name:</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
            </div>
            <div class="form-group">
                <label for="lab">Lab:</label>
                <select name="lab" class="form-control" required>
                    <option value="A" {{ old('lab') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('lab') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('lab') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('lab') == 'D' ? 'selected' : '' }}>D</option>
                </select>
            </div>
            <div class="form-group">
                <label for="judul">App Title:</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>
            <div class="form-group">
                <label for="tema">Theme:</label>
                <select name="tema" class="form-control" required>
                    @foreach ($availableTemas as $tema => $limit)
                        <option value="{{ $tema }}" {{ old('tema') == $tema ? 'selected' : '' }}>{{ $tema }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="api_link">API Link:</label>
                <input type="url" name="api_link" class="form-control" value="{{ old('api_link') }}" required>
            </div>
            <div class="form-group">
                <label for="github_link">GitHub Link:</label>
                <input type="url" name="github_link" class="form-control" value="{{ old('github_link') }}" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

        <p class="nav-link">Already submiting? Check your submission <a href="{{ route('form.entries') }}">here!</a> </p>

        <p class="form-credit">© 99% Created by ChatGPT3.5</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
