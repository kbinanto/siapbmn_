<!-- Menghubungkan dengan view template master -->
@extends('master_menu')

@section('submenu')

<div class="main-panel" id="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">

        <div class="container-fluid">
            <div class="navbar-wrapper">

                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>

                <a class="navbar-brand" href="#pablo">ANALISA DATA / NILAI PEROLEHAN MINUS</a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navigation">

                <form>
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="now-ui-icons ui-1_zoom-bold"></i>
                            </div>
                        </div>
                    </div>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            <i class="now-ui-icons media-2_sound-wave"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Stats</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="now-ui-icons location_world"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Some Actions</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>
                                <span class="d-lg-none d-md-block">Account</span>
                            </p>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="panel-header panel-header-sm">

    </div>

    <div class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Selisih Nilai Perolehan Minus</h4>
                        <a href="{{url('/Import_Nilai_perolehan_minus/Export_Nilai_perolehan_minus')}}"
                            class="btn btn-success" target="_blank">Export File</a>
                        <code>
                            <- download file. kemudian isikan penjelasan pada [kolom penjelasan]</code>
                    </div>
                    <div class="card-body">

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%"> <label>No</label></th>
                                    <th style="width: 25%"> <label>SAP</label></th>
                                    <th style="width: 25%"> <label>Data Satker</label></th>
                                    <th style="width: 22%"> <label>Data Barang</label></th>
                                    <th style="width: 12%"> <label> Rph Aset</label></th>
                                    <th style="width: 12%"> <label>Penjelasan</label></th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%"> <label>No</label></th>
                                    <th style="width: 25%"> <label>SAP</label></th>
                                    <th style="width: 25%"> <label>Data Satker</label></th>
                                    <th style="width: 22%"> <label>Data Barang</label></th>
                                    <th style="width: 12%"> <label> Rph Aset</label></th>
                                    <th style="width: 12%"> <label>Penjelasan</label></th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($Nilai_perolehan_minus as $s)
                                <tr>

                                    <td><label>{{ $i++ }}</label></td>

                                    <td>
                                        <label>Kode : {{$s->sap}}</label>

                                    </td>
                                    <td>
                                        <label>Nama : {{$s->kode_satker}}</label>
                                        <br>
                                        <label>Akun : {{$s->nama_satker}}</label>
                                    </td>
                                    <td>
                                        <label>Kode : {{$s->kode_barang}}</label>
                                        <br>
                                        <label>Nama : {{$s->nama_barang}}</label>
                                        <br>
                                        <label>NUP : {{$s->nomor_aset}}</label>

                                    </td>
                                    <td><label>{{$s->rph_aset}}</label></td>

                                    <td><label>{{$s->penjelasan}}</label></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- end content-->
                </div><!--  end card  -->
            </div>

            <div class="col-md-12">
                <form id="TypeValidation" class="form-horizontal"
                    action="{{url('/Pelaksana_Nilai_perolehan_minus/Import_Excel_Nilai_perolehan_minus_Pelaksana')}}"
                    method="post" enctype="multipart/form-data">

                    <div class="card ">

                        <div class="card-header ">
                            <h4 class="card-title">Import File Perbaikan</h4>
                        </div>

                        <div class="card-body ">

                            {{-- notifikasi form validasi --}}
                            @if ($errors->has('file'))

                            <div class="alert alert-danger" role="alert">

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{ $errors->first('file') }}
                            </div>

                            @endif

                            {{-- notifikasi sukses --}}
                            @if ($sukses = Session::get('sukses'))
                            <div class="alert alert-primary" role="alert">

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{ $sukses }}
                            </div>
                            @endif

                            @if ($pengosongan = Session::get('pengosongan'))
                            <div class="alert alert-danger" role="alert">

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{ $pengosongan }}
                            </div>

                            @endif

                            {{ csrf_field() }}
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Pilih File</label>

                                <div class="col-sm-7">
                                    <div class="form-group form-file-upload form-file-simple">
                                        <input type="text" class="form-control inputFileVisible"
                                            placeholder="klik disini..." required>
                                        <input type="file" name="file" class="inputFileHidden" required>
                                    </div>
                                </div>

                                <label class="col-sm-3 label-on-right"><code>tipe file : .xlsx</code></label>
                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <a class="btn btn-warning"
                                onclick="return confirm('tabel [nilai_perolehan_minus_tmp] akan kita kosongkan')"
                                href="{{url('/Pelaksana_Nilai_perolehan_minus/Pengosongan_Nilai_perolehan_minus_Pelaksana')}}">1.
                                Pengosongan Data .tmp</a>
                            <button type="submit" class="btn btn-primary">2. Import File</button>
                            <a class="btn btn-danger"
                                onclick="return confirm('sinkronisasi data [nilai_perolehan_minus_tmp] >> [nilai_perolehan_minus] ')"
                                href="http://localhost/siapbmn/sync.php" target="_blank">
                                3. Sinkronisasi Data</a>
                            <a class="btn btn-default"
                                onclick="return confirm('tabel [nilai_perolehan_minus_tmp] akan kita kosongkan')"
                                href="{{url('/Pelaksana_Nilai_perolehan_minus/Pengosongan_Nilai_perolehan_minus_Pelaksana')}}">4.
                                Pembersihan Data .tmp</a>
                        </div>

                        <div class="card-header ">
                            <code>Langkah-langkah mengirimkan file perbaikan : </code>
                            <br>
                            <code>1. lakukan pengosongan data .tmp ; </code>

                            <br>
                            <code>2. pastikan file yang akan anda upload adalah file yang sudah diisikan penjelasan pada
                                [kolom penjelasan], terkait selisih data ; </code>
                            <br>
                            <code>3. klik sinkronisasi data, untuk memperbarui data yang sudah diberikan penjelasan;
                                <br>
                                <code>4. lakukan pembersihan data .tmp, untuk mengakhiri sesi upload file perbaikan.
                                </code>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <footer class="footer">

        <div class=" container-fluid ">
            <nav>
                <ul>
                    <li>
                        <a href="https://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                            Blog
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright" id="copyright">
                &copy; <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a
                    href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
            </div>
        </div>

    </footer>

</div>
</div>

<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-yellow" data-color="yellow"></span>
                        <span class="badge filter badge-blue" data-color="blue"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange active" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="header-title">
                Sidebar Mini
            </li>
            <li class="adjustments-line">

                <div class="togglebutton switch-sidebar-mini">
                    <span class="label-switch">OFF</span>
                    <input type="checkbox" name="checkbox" checked class="bootstrap-switch" data-on-label=""
                        data-off-label="" />
                    <span class="label-switch label-right">ON</span>
                </div>
            </li>

        </ul>
    </div>
</div>

@endsection