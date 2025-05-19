<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khetibuddy- Edit crop</title>
</head>
<body>
    <div class="container">
        <div class="col-md-9 d-flex align-items-center justify-content-center py-5">
            <div class="form-section w-75">
            <h4 class="mb-4 text-success text-center">Edit Crop Details</h4>
            <form action="{{ route('crop.update', [$crop->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                <label for="cropName" class="form-label">Crop Name</label>
                <input type="text" class="form-control" value="{{$crop->crop_name}}" id="cropName" name="cropname" placeholder="Enter crop name">
                </div>
                <div class="mb-3">
                <label for="cropWeight" class="form-label">Crop Weight (kg)</label>
                <input type="number" class="form-control" value="{{ $crop->crop_weight }}" id="cropWeight" name="cropweight" placeholder="Enter weight">
                </div>
                <div class="mb-3">
                <label for="cropPrice" class="form-label">Price (in ₹)</label>
                <input type="number" class="form-control" id="cropPrice" value="{{ $crop->crop_price }}" name="cropprice" placeholder="Enter price">
                </div>
                <div class="mb-3">
                <label for="cropCategory" class="form-label">Category</label>
                <input type="text" class="form-control" id="cropCategory" value="{{ $crop->crop_category }}" name="cropcategory" placeholder="Rice - basmati/jasmine | Sugarcane - CoS 8436,">
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Edit Crop</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>