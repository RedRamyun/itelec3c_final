<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Position</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f4f8;
        }
        
        .registration-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 40px;
            border-top: 5px solid #1e40af;
        }
        
        h1 {
            color: #1e40af;
            margin-bottom: 30px;
        }
        
        .form-label {
            font-weight: 600;
            color: #334155;
        }
        
        .btn-submit {
            background-color: #1e40af;
            color: white;
            padding: 12px 40px;
            border: none;
            width: 100%;
        }
        
        .btn-submit:hover {
            background-color: #1e3a8a;
            color: white;
        }
        
        .btn-back {
            background-color: #6b7280;
            color: white;
            padding: 12px 40px;
            border: none;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-back:hover {
            background-color: #4b5563;
            color: white;
        }
        
        .required {
            color: #dc2626;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="registration-container">
                    <h1 class="text-center">Edit Position Information</h1>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('positions.update', $position->position_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="position_name" class="form-label">
                                Position Name <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="position_name" 
                                name="position_name" 
                                value="{{ old('position_name', $position->position_name) }}"
                                required
                            >
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Description
                            </label>
                            <textarea 
                                class="form-control" 
                                id="description" 
                                name="description" 
                                rows="4"
                                placeholder="Enter position description (optional)"
                            >{{ old('description', $position->description) }}</textarea>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-6 mb-2">
                                <a href="{{ route('display.positions') }}" class="btn btn-back">
                                    Cancel
                                </a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <button type="submit" class="btn btn-submit">
                                    Update Position
                                </button>
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