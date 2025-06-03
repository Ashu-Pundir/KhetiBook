<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .map-div{
            padding: 60px 10px;
        }

    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">User Details</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>    

    <div class="row g-4">
        <!-- User Info -->
        <div class="col-md-8">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" value="{{ $user->phone_number }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">District</label>
                    <input type="text" class="form-control" value="{{ $user->district }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" value="{{ $user->city }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Pincode</label>
                    <input type="text" class="form-control" value="{{ $user->pincode }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">State</label>
                    <input type="text" class="form-control" value="{{ $user->state }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-control" value="{{ $user->country }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Latitude</label>
                    <input type="text" class="form-control" value="{{ $user->latitude }}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="form-label">Longitude</label>
                    <input type="text" class="form-control" value="{{ $user->longitude }}" disabled>
                </div>
            </div>
        </div>

        <!-- Small Map -->
        <div class="col-md-4 map-div">
            <div class="row mb-2">
                <div class="col-6 text-center offset-3">
                    <label class="form-label fw-bold">Location on Map</label>
                </div>
                
            </div>
            <div class="card">
                <div style="height: 250px;">
                    <iframe
                        width="100%"
                        height="100%"
                        frameborder="0"
                        style="border:0"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q={{ $user->latitude }},{{ $user->longitude }}&hl=es;z=14&output=embed"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

    <!-- Crop Details -->
    <div class="mt-5">
        <h4>Crop Details</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>S No.</th>
                        <th>Crop Name</th>
                        <th>Crop Category</th>
                        <th>Crop Quantity</th>
                        <th>Crop Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @forelse($crop as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->crop_name }}</td>
                            <td>{{ $item->crop_category }}</td>
                            <td>{{ $item->crop_weight }}</td>
                            <td>{{ $item->crop_price }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No crops available.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
