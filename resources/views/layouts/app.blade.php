<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Système de Pointage</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- ======================= -->
    <!-- 🎨  UI MODERN PRO STYLE -->
    <!-- ======================= -->
    <style>
        body {
            background-color: #f5f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar modern */
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
        }
        .navbar-brand {
            font-weight: 600;
        }

        /* Cards modernisées */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }
        .card-header {
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Boutons modernes */
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }

        /* Sections de titre */
        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: #444;
            border-left: 4px solid #0d6efd;
            padding-left: 10px;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        /* Inputs */
        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
        }

        /* Tables */
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        /* Breadcrumb */
        .breadcrumb {
            background: white;
            padding: 10px 15px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }

        /* Avatar */
        .avatar-circle {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg,#4e73df,#1cc88a);
            color: #fff;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:42px;
            font-weight:bold;
            box-shadow:0 4px 12px rgba(0,0,0,0.15);
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-clock"></i> Système de Pointage
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employe.ShowEmploye') }}">
                            <i class="fas fa-users"></i> Employés
                        </a>
                    </li>
                    <!-- Dans resources/views/layouts/app.blade.php ou votre sidebar -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pointage.index') }}">
                            <i class="fas fa-clock me-2"></i> Pointage
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pointage.rapport') }}">
                            <i class="fas fa-chart-bar me-2"></i> Rapports
                        </a>
                    </li>
                </ul>

                <!-- Profil -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Mon Compte
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('deconnexion') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2024 Système de Pointage. Tous droits réservés.</p>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
