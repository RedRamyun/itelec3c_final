<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Position</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f4f8;
            padding: 40px 0;
        }
        
        .voter-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-top: 5px solid #1e40af;
        }
        h1 {
            color: #1e40af;
            margin-bottom: 30px;
        }
        .form-label {
            color: #1e3a8a;
            font-weight: 500;
        }
        .btn-vote {
            background-color: #1e40af;
            color: white;
            padding: 10px 30px;
            border: none;
        }
        .btn-vote:hover {
            background-color: #1e3a8a;
            color: white;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="voter-container">
                    <div class="mb-3">
                        <a href="{{ route('display.positions') }}" class="text-decoration-none">
                            <small>← View All Positions</small>
                        </a>
                    </div>
                    
                    <h1 class="text-center">Create Position</h1>
                    <form action="{{ route('position.store') }}" method="POST">
                        @csrf
                        
                        <!-- Position Name -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="position_name" class="form-label">Position Name</label>
                                <input type="text" name="position_name" id="position_name" class="form-control" value="{{ old('position_name') }}" required>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="row mb-4">
                            <div class="col">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter position description (optional)">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-vote">Create Position</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>