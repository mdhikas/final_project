<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
    <link rel="shortcut icon" href="/dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/dist/css/my-config.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-success">

            {{-- Left Navbar Links --}} 
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="/dist/img/person.png" class="user-image img-circle elevation-2">
                        <span class="d-none d-md-inline">{{auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-red">
                            <img src="/dist/img/person.png" alt="profile_img" class="img-circle elevation-2">
                            <p>
                                {{auth()->user()->name}}
                                <small>Management Training Industry</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            {{-- @if(auth()->user()->status == 'Karyawan') --}}
                            <a href="/profil" class="btn btn-default btn-flat">Profile</a>
                            {{-- @endif --}}
                            <a href="/signout" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-no-expand sidebar-dark-success" style="position:;">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link navbar-success">
                <img src="/dist/img/logo.png" alt="" class="brand-image">
                <span class="brand-text font-weight-bold">WELCOME</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-3">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if(auth()->user()->status == '')
                        <li class="nav-item">
                            <a href="/dashboard/form" class="nav-link">
                                <i class="fas nav-icon fa-user-plus"></i>
                                <p>Input Karyawan</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            @if(auth()->user()->status == 'Admin')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/dashboard/karyawan" class="nav-link">
                                        <i class="fas nav-icon fa-link"></i>
                                        <p>Data Karyawan</p>
                                    </a>
                                </li>
                            </ul>
                            @endif
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/dashboard/sertifikasi" class="nav-link">
                                        <i class="fas nav-icon fa-link"></i>
                                        <p>Data Sertifikasi</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/dashboard/nonsertifikasi" class="nav-link">
                                        <i class="fas nav-icon fa-link"></i>
                                        <p>Data Non Sertifikasi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/test/index" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Certification Test
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth/change-password" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Change Password
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="https://solusibangunindonesia.com/">PT. Solusi Bangun Indonesia
                    Tbk</a>. All Rights Reserved</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> Alpha
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <script src="/dist/js/myscript.js"></script>
    <!-- SweetAlert2 -->
    <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- DataTables -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        // $('#tb-hasil-akhir').DataTable({
        //     "columnDefs": [
        //         {
        //             "orderable": false,
        //             "targets": [0, 1],
        //         }
        //     ]
        // });
        $('.table').DataTable();
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-edit').on('click', function() {
                $('#editModal').modal('show');
                var id = $(this).data('id');
                var kode = $(this).data('kode');
                var nama_kriteria = $(this).data('nama');
                var bobot = $(this).data('bobot');
                var minmax = $(this).data('minmax');
                var tipe_preferensi = $(this).data('tipe_preferensi');
                var q = $(this).data('q');
                var p = $(this).data('p');

                $('#editForm').attr('action', '/dashboard/test/kriteria/' + id);
                $('#deleteForm').attr('action', '/dashboard/test/kriteria/' + id);
                $('#id').attr('id', id);
                $('#kode').attr('value', kode);
                $('#nama_kriteria').attr('value', nama_kriteria);
                $('#bobot').attr('value', bobot);
                $('#minmax').empty();
                if (minmax === "Minimum") {
                    $('#minmax').append('<option value="Minimum" selected>Minimum</option>');
                    $('#minmax').append('<option value="Maximum">Maximum</option>');
                } else {
                    $('#minmax').append('<option value="Minimum">Minimum</option>');
                    $('#minmax').append('<option value="Maximum" selected>Maximum</option>');
                }
                $('#tipe_preferensi').empty();
                switch (tipe_preferensi) {
                    case "Tipe Biasa (Usual Criterion)":
                        $('#tipe_preferensi').append('<option value="Tipe Biasa (Usual Criterion)" selected>Tipe Biasa (Usual Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Quasi (Quasi Criterion atau U-Shape)">Tipe Quasi (Quasi Criterion atau U-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linier (Linear Criterion atau V-Shape)">Tipe Linier (Linear Criterion atau V-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Tingkatan (Level Criterion)">Tipe Tingkatan (Level Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linear Quasi (Linear Criterion with Indifference)">Tipe Linear Quasi (Linear Criterion with Indifference)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Gaussian">Tipe Gaussian</option>');
                        break;
                    case "Tipe Quasi (Quasi Criterion atau U-Shape)":
                        $('#tipe_preferensi').append('<option value="Tipe Biasa (Usual Criterion)">Tipe Biasa (Usual Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Quasi (Quasi Criterion atau U-Shape)" selected>Tipe Quasi (Quasi Criterion atau U-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linier (Linear Criterion atau V-Shape)">Tipe Linier (Linear Criterion atau V-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Tingkatan (Level Criterion)">Tipe Tingkatan (Level Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linear Quasi (Linear Criterion with Indifference)">Tipe Linear Quasi (Linear Criterion with Indifference)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Gaussian">Tipe Gaussian</option>');
                        break;
                    case "Tipe Linier (Linear Criterion atau V-Shape)":
                        $('#tipe_preferensi').append('<option value="Tipe Biasa (Usual Criterion)">Tipe Biasa (Usual Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Quasi (Quasi Criterion atau U-Shape)">Tipe Quasi (Quasi Criterion atau U-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linier (Linear Criterion atau V-Shape)" selected>Tipe Linier (Linear Criterion atau V-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Tingkatan (Level Criterion)">Tipe Tingkatan (Level Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linear Quasi (Linear Criterion with Indifference)">Tipe Linear Quasi (Linear Criterion with Indifference)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Gaussian">Tipe Gaussian</option>');
                        break;
                    case "Tipe Tingkatan (Level Criterion)":
                        $('#tipe_preferensi').append('<option value="Tipe Biasa (Usual Criterion)">Tipe Biasa (Usual Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Quasi (Quasi Criterion atau U-Shape)">Tipe Quasi (Quasi Criterion atau U-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linier (Linear Criterion atau V-Shape)">Tipe Linier (Linear Criterion atau V-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Tingkatan (Level Criterion)" selected>Tipe Tingkatan (Level Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linear Quasi (Linear Criterion with Indifference)">Tipe Linear Quasi (Linear Criterion with Indifference)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Gaussian">Tipe Gaussian</option>');
                        break;
                    case "Tipe Linear Quasi (Linear Criterion with Indifference)":
                        $('#tipe_preferensi').append('<option value="Tipe Biasa (Usual Criterion)">Tipe Biasa (Usual Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Quasi (Quasi Criterion atau U-Shape)">Tipe Quasi (Quasi Criterion atau U-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linier (Linear Criterion atau V-Shape)">Tipe Linier (Linear Criterion atau V-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Tingkatan (Level Criterion)">Tipe Tingkatan (Level Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linear Quasi (Linear Criterion with Indifference)" selected>Tipe Linear Quasi (Linear Criterion with Indifference)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Gaussian">Tipe Gaussian</option>');
                        break;
                    case "Tipe Gaussian":
                        $('#tipe_preferensi').append('<option value="Tipe Biasa (Usual Criterion)">Tipe Biasa (Usual Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Quasi (Quasi Criterion atau U-Shape)">Tipe Quasi (Quasi Criterion atau U-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linier (Linear Criterion atau V-Shape)">Tipe Linier (Linear Criterion atau V-Shape)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Tingkatan (Level Criterion)">Tipe Tingkatan (Level Criterion)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Linear Quasi (Linear Criterion with Indifference)">Tipe Linear Quasi (Linear Criterion with Indifference)</option>');
                        $('#tipe_preferensi').append('<option value="Tipe Gaussian" selected>Tipe Gaussian</option>');
                        break;
                }
                $('#q').attr('value', q);
                $('#p').attr('value', p);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });

            $('.btn-edit').on('click', function() {
                $('#editModalAlt').modal('show');
                var id = $(this).data('id');
                var kode = $(this).data('kode');
                var nama_alternatif = $(this).data('nama_alternatif');

                $('#editFormAlt').attr('action', '/dashboard/test/alternatif/'+id);
                $('#id').attr('value', id);
                $('#kode').attr('value', kode);
                $('#nama_alternatif').attr('value', nama_alternatif);
            });

            $('.btn-tambah').on('click', function() {
                $('#tambahModalNilai').modal('show');
                var id = $(this).data('id');
                var kode = $(this).data('kode');
                var nama_alternatif = $(this).data('nama_alternatif');

                $('#tambahFormNilai').attr('action', '/dashboard/test/nilai_alternatif/'+id);
                $('#kode').attr('value', kode);
                $('#nama_alternatif').attr('value', nama_alternatif);
            });

            $('.btn-edit').on('click', function() {
                $('#editModalNilai').modal('show');
                var id = $(this).data('id');
                var kode = $(this).data('kode');
                var nama_alternatif = $(this).data('nama_alternatif');
                var c1 = $(this).data('c1');
                var c2 = $(this).data('c2');
                var c3 = $(this).data('c3');
                var c4 = $(this).data('c4');
                var c5 = $(this).data('c5');
                var c6 = $(this).data('c6');

                $('#editFormNilai').attr('action', '/dashboard/test/nilai_alternatif/'+id);
                $('#editKode').attr('value', kode);
                $('#editNama_alternatif').attr('value', nama_alternatif);
                $('#editC1').attr('value', c1);
                $('#editC2').attr('value', c2);
                $('#editC3').attr('value', c3);
                $('#editC4').attr('value', c4);
                $('#editC5').attr('value', c5);
                $('#editC6').attr('value', c6);
            });

            $('.btn-tambah-kriteria').on('click', function() {
                const id_alternatif = $(this).data('id_alternatif');
                const kode_alternatif = $(this).data('kode_alternatif');
                $('#modalTambahKriteria').modal('show');
                $('#modalTambahKriteria .modal-body #headKodeAlternatif').html("Kode Alternatif : " + kode_alternatif);
                $('#modalTambahKriteria .modal-body #id_alternatif').val(id_alternatif);
                $.ajax({
                    url: '/alternatif/get_criteria',
                    type: 'get',
                    data: { id_alternatif: id_alternatif },
                    dataType: "json",
                    success: function(res) {
                        $('#modalTambahKriteria #pilih_kriteria').empty();
                        $('#modalTambahKriteria #pilih_kriteria').append('<option selected disabled>--Pilih Kriteria--</option>');
                        for (let i = 0; i < res.length; i++) {
                            $('#modalTambahKriteria #pilih_kriteria').append(`<option value="`+ res[i].id +`">`+ res[i].kode +` - ` + res[i].nama_kriteria + `</option>`);
                        }
                    }
                });
                

            });

            const title = $('#flash-message').data('title');
            const message = $('#flash-message').data('message');
            const type = $('#flash-message').data('type');

            if (message) {
                Swal.fire({
                    title: title,
                    html: message,
                    type: type
                });
            }
            $('[data-toggle="tooltip"]').tooltip()

            $('.confirmDeleteNilaiAlternatif').click(function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const kode = $(this).data('kode');
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    html: "Data nilai dengan kode <b>" + kode + "</b> akan dihapus!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $('#form-delete-nilai-alternatif-' + id).submit();
                    }
                })
            });

            $('.btn-ubah-nilai').on('click', function() {
                const id_alternatif = $(this).data('id_alternatif');
                const kode_alternatif = $(this).data('kode_alternatif');
                $('#modalUbahNilai').modal('show');
                $('#modalUbahNilai .modal-body h5').html('Kode Alternatif : ' + kode_alternatif);
                $('#modalUbahNilai .modal-body [name="id_alternatif"]').val(id_alternatif);
            });

            $('#formTambahAlternatif').validate({
                rules: {
                    "kode": {
                        required: true
                    },
                    "nama_alternatif": {
                        required: true
                    }
                },
                messages: {
                    "kode": {
                        required: function() {
                            Toast.fire({
                                type: 'error',
                                title: 'Kolom kode alternatif harus diisi.'
                            })
                        }
                    },
                    "nama_alternatif": {
                        required: function() {
                            Toast.fire({
                                type: 'error',
                                title: 'Kolom nama alternatif harus diisi.'
                            })
                        }
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $('#formChangePassword').validate({
                rules: {
                    password: {
                        required: true,
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: {
                        required: "Kolom password baru harus diisi",
                    },
                    confirm_password: {
                        required: "Kolom konfirmasi password baru harus diisi",
                        equalTo: "Konfirmasi password baru harus sama dengan password baru"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            })

            $('.confirmDeleteAlternatif').on('click', function(e) {
                e.preventDefault();
                const id_alternatif = $(this).data('id');
                const kode_alternatif = $(this).data('kode');
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    html: "Data alternatif dengan kode <b>" + kode_alternatif + "</b> akan dihapus!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $('#form-delete-alternatif-' + id_alternatif).submit();
                    }
                });
            });

            $('.confirmDeleteKriteria').on('click', function(e) {
                e.preventDefault();
                const id_kriteria = $(this).data('id');
                const kode_kriteria = $(this).data('kode');
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    html: "Data kriteria dengan kode <b>" + kode_kriteria + "</b> akan dihapus!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $('#form-delete-kriteria-' + id_kriteria).submit();
                    }
                });
            });
        });
    </script>
    <!-- @include('sweetalert::alert') -->

</body>

</html>