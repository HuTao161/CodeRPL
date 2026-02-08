<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Alumni RPL</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
            font-family: 'Segoe UI', sans-serif;
        }

        .alumni-card {
            border-radius: 20px;
            transition: 0.3s;
        }

        .alumni-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .alumni-photo {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border: 4px solid #0d6efd;
        }

        .header-box {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <!-- HEADER -->
    <div class="header-box text-center mb-5">
        <h1 class="fw-bold text-primary">
            <i class="fas fa-user-graduate"></i> Daftar Alumni RPL
        </h1>
        <p class="text-muted fs-5">SMKN 1 Denpasar - Rekayasa Perangkat Lunak</p>
    </div>

    <!-- SEARCH -->
    <form action="{{ route('alumni.search') }}" method="GET" class="mb-4">
        <div class="input-group input-group-lg shadow">
            <input type="text" name="search" class="form-control" placeholder="Cari nama alumni...">
            <button class="btn btn-primary">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

    <!-- CEK DATA -->
    @if(!isset($alumni) || count($alumni) == 0)
        <div class="alert alert-danger text-center p-4 shadow">
            <h4>😢 Data alumni belum tersedia</h4>
            <p>Total Alumni: 0</p>
        </div>
    @else

    <!-- LIST ALUMNI -->
    <div class="row">
        @foreach($alumni as $a)
        <div class="col-md-4 mb-4">
            <div class="card alumni-card shadow border-0 h-100">
                <div class="card-body text-center">

                    <!-- FOTO -->
                    @if(is_object($a) && !empty($a->foto))
                        <img src="{{ asset('storage/'.$a->foto) }}" class="rounded-circle alumni-photo mb-3">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="rounded-circle alumni-photo mb-3">
                    @endif

                    <!-- NAMA -->
                    <h5 class="fw-bold">
                        {{ is_object($a) ? $a->nama : $a }}
                    </h5>

                    <!-- TAHUN LULUS -->
                    <p class="text-muted">🎓 Angkatan {{ is_object($a) ? $a->tahun_lulus : '-' }}</p>

                    <!-- TEMPAT PKL / KERJA -->
                    @if(is_object($a) && !empty($a->tempat_pkl))
                        <p class="mb-1"><i class="fas fa-building text-primary"></i> {{ $a->tempat_pkl }}</p>
                    @endif

                    <!-- BUTTON DETAIL -->
                    @if(is_object($a))
                        <a href="{{ route('alumni.show', $a->id) }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye"></i> Lihat Profil
                        </a>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- TOTAL -->
    <div class="text-center mt-4 text-muted fw-bold">
        Total Alumni: {{ count($alumni) }}
    </div>

    @endif

</div>

</body>
</html>
