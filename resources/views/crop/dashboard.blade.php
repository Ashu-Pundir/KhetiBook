<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Khetibuddy | My Crops</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>

    

    :root {
      --bg-main: #f9fafb;
      --table-header: #e6ebe9;
      --accent: #7a9e7e;
      --text: #2d2d2d;
    }

    body {
      background-color: var(--bg-main);
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
    }

    .navbar {
      background-color: #366d24;
      border-bottom: 1px solid #cfd8d6;
    }
    
    .navbar-text {
        flex: 1;
        text-align: center;
        font-weight: 500;
        color: white;
    }

    .btn-logout {
      color: #333;
    }

    .btn-logout:hover {
      color: #000;
    }

    .sidebar {
      background-color: #8ec47c;
      height: 92vh;
      border-right: 1px solid #dee2e6;
      padding-top: 2rem;
    }

    .sidebar a {
      margin: 2px;
      color: aliceblue;
      padding: 12px 16px;
      display: block;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #e6f3e6;
      color: #2d7833;
      font-weight: 600;
      border-radius: 5px;
    }

    .table thead {
      background-color: var(--table-header);
    }

    .main-content {
      padding: 2rem;
    }

    .action-buttons .btn {
      padding: 0.3rem 0.6rem;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar d-flex justify-content-between px-4 py-2">
    <div class="fw-bold text-light">Khetibuddy</div>
    <div class="navbar-text">
     {{ Auth::check() ? Auth::user()->name : 'Guest' }}
    </div>
    <div>
      <a href="{{ route('logout') }}" class="btn btn-outline-secondary text-white btn-sm">Logout</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      
      <!-- Sidebar -->
     <div class="col-md-3 sidebar">
    <h5 class="text-center mb-4 text-success">Menu</h5>

    <a href="{{ route('crop.dashboard') }}" class="{{ request()->routeIs('crop.dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('crop.addcrop') }}" class="{{ request()->routeIs('crop.addcrop') ? 'active' : '' }}">
        Add New Crop
    </a>

    <a href="{{ url('/my-crops') }}" class="{{ request()->is('my-crops') ? 'active' : '' }}">
        My Crops
    </a>

    <a href="{{ url('/settings') }}" class="{{ request()->is('settings') ? 'active' : '' }}">
        Settings
    </a>
</div>

  @php
    $count = 1;
  @endphp

      <!-- Main Content -->
      <div class="col-md-9 main-content">
        <h3 class="mb-4 text-muted text-center">Your Crop Records</h3>

        {{-- pdf button --}}
        <a href="{{ route('crops.pdf') }}" class="btn btn-success mb-3" target="_blank">
          📄 Download Crop Report (PDF)
        </a>

        @if($crops->count() > 0)
        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle text-center">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Crop Name</th>
                <th>Crop Category</th>
                <th>Crop Weight (kg)</th>
                <th>Crop Price (₹)</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($crops as $crop)
              <tr>
                <td>{{ ($crops->currentPage() - 1)* $crops->perPage() + $loop->iteration}}</td>
                <td>{{ $crop->crop_name }}</td>
                <td>{{ $crop->crop_category }}</td>
                <td>{{ $crop->crop_weight }}</td>
                <td>{{ $crop->crop_price }}</td>
                <td class="action-buttons">
                  <a href="{{ route('crop.edit', [$crop->id]) }}">
                    <button class="btn btn-primary text-bg-light">
                    <i class="bi bi-pencil"></i>
                    
                  </a>

                  <form action="{{ route('crop.delete', [$crop->id])}}" method="POST">
                    @csrf
                    @method('delete')
               
                  <button class="btn btn-danger m-1">
                      <i class="fa-solid fa-trash"></i>
                  </button>
                     </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{-- Pagination Links --}}
            <div class="d-flex justify-content-center mt-3">
              {{ $crops -> links()}}
            </div>

        </div>
        @else
          <p class="text-center text-muted">No crop records found.</p>
        @endif
      </div>
    </div>
  </div>



</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
