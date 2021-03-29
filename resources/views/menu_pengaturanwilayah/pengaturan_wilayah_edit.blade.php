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

                <a class="navbar-brand" href="#pablo">PENGATURAN WILAYAH / UPDATE</a>
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
                <div class="card ">

                    <div class="card-header ">
                        <h4 class="card-title">Update Data </h4>
                    </div>

                    <div class="card-body ">
                        <form method="post" action="{{ url('/Pengaturan_wilayah/update/'.$Referensi_wilayah->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label>Satuan Kerja</label>

                            <div class="form-group">
                                <input type="text" class="form-control" name="baes1" placeholder="Nama pegawai .."
                                    value=" {{ $Referensi_wilayah->baes1 }}" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="wilayah_satker"
                                    placeholder="Nama pegawai .." value=" {{ $Referensi_wilayah->wilayah_satker }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="kode_satker" placeholder="Nama pegawai .."
                                    value=" {{ $Referensi_wilayah->kode_satker }}" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_satker" placeholder="Nama pegawai .."
                                    value=" {{ $Referensi_wilayah->nama_satker }}" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama pegawai .."
                                    value=" {{ $Referensi_wilayah->kode_pembina }}" readonly>
                            </div>

                            <label>Ganti Pembina Wilayah</label>
                            <div class="form-group">
                                <select name="kode_pembina" class="selectpicker" data-size="7"
                                    data-style="btn btn-danger btn-round btn-block" title="Single Select">
                                    <option disabled selected>Pilih pembina wilayah ...</option>
                                    @foreach ($User as $User)
                                    <option value="{{ $User->name }}">{{ $User->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check mt-3">
                                <label class="form-check-label">


                                </label>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-fill btn-primary">Submit</button>
                            </div>

                        </form>

                    </div>


                </div>
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