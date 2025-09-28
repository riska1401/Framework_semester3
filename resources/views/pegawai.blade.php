<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero-section {
            background-color: #3187e9;
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
        }

        .card {
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
        }

        .footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .status-baru {
            background-color: #ffeeba;
            color: #664d03;
        }

        .status-senior {
            background-color: #d1e7dd;
            color: #0f5132;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">My Laravel App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <!-- Menampilkan nama dan posisi dari controller -->
            <h1>{{ $data['employee_name'] }}</h1>
            <p>{{ $data['position'] }}</p>
        </div>
    </section>

    <!-- Content Section -->
    <section id="content" class="container ">
        <div class="row">
            <div class="col-md-6">
                <!-- Data Pribadi Pegawai -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Tentang Pegawai</h5>
                        <p class="card-text">
                            {{ $data['employee_name'] }} adalah {{ $data['position'] }} kami.
                            Ia memiliki cita-cita untuk {{ $data['career_goal'] }}.
                        </p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>

                <!-- Accordion dengan Informasi Tambahan -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne">
                                Informasi Bergabung
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Bergabung sejak {{ $data['join_date'] }} dan telah bekerja selama {{ $data['working_duration'] }} hari.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo">
                                Gaji & Usia
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Usia: {{ $data['age'] }} tahun. Gaji bulanan: Rp {{ number_format($data['salary'], 0, ',', '.') }}.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Badges, List & Card -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Keahlian</h3>
                        <div class="mb-3">
                            <!-- Menampilkan keahlian menggunakan loop Blade -->
                            @foreach ($data['skills'] as $skill)
                                <span class="badge text-bg-primary">{{ $skill }}</span>
                            @endforeach
                        </div>
                        <p class="text-muted small mt-3 mb-0">
                            Keahlian ini membantu {{ $data['employee_name'] }} mencapai target kerjanya.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Alerts -->
                <div class="card ">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Pesan Status</h3>
                        <!-- Menampilkan pesan status dinamis -->
                        <div class="alert @if($data['working_duration'] < 730) 
                                    alert-warning status-baru @else alert-success status-senior @endif">
                            {{ $data['status_info'] }}
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Tindakan</h3>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-primary">Hubungi</button>
                            <button class="btn btn-secondary">Kirim Pesan</button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Ringkasan Data</h3>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Posisi</th>
                                        <th>Usia</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $data['employee_name'] }}</td>
                                        <td>{{ $data['position'] }}</td>
                                        <td>{{ $data['age'] }}</td>
                                        <td>
                                            <span class="badge @if($data['working_duration'] < 730) text-bg-warning @else text-bg-success @endif">
                                                @if($data['working_duration'] < 730) Baru @else Senior @endif
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} My Laravel App. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
