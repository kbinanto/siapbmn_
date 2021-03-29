<!-- Menghubungkan dengan view template master -->
@extends('master_menu')

@section('submenu')

<meta name="csrf-token" content="{{ csrf_token() }}">

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

                <a class="navbar-brand" href="#pablo">VERIFIKASI VALIDASI / REKONSILIASI INTERNAL</a>
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
                        <h4 class="card-title">Data Analisa Rekon SP2D BMN Akun 53</h4>
                        <a href="{{url('Import_Sp2d53/Export_Sp2d53_AnalisaData')}}" class="btn btn-success"
                            target="_blank">Export
                            File</a>
                        <code>
                            <- download file. untuk memeriksa hasil analisa data dari analis </code> <br>
                        <button style="margin-bottom: 10px" class="btn btn-primary delete_all"
                            data-url="{{ url('/Kepala_bagian_Sp2d53/Analisaok_Sp2d53') }}">Analisa Ok
                            (Selected)</button>
                        <button style="margin-bottom: 10px" class="btn btn-danger delete_all"
                            data-url="{{ url('/Kepala_bagian_Sp2d53/Analisanok_Sp2d53') }}">Analisa Tidak Ok
                            (Selected)</button>
                    </div>
                    <div class="card-body">

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%"> <label><input type="checkbox" id="master"></label></th>
                                    <th style="width: 5%"> <label>No</label></th>
                                    <th style="width: 25%"> <label>Data Satker</label></th>
                                    <th style="width: 22%"> <label>Data Akun</label></th>
                                    <th style="width: 12%"> <label> Rph Saiba</label></th>
                                    <th style="width: 12%"> <label>Rph Simak</label></th>
                                    <th style="width: 12%"> <label>Rph Selisih</label></th>
                                    <th style="width: 12%"> <label>Penjelasan</label></th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%"> <label></label></th>
                                    <th style="width: 5%"> <label>No</label></th>
                                    <th style="width: 25%"> <label>Data Satker</label></th>
                                    <th style="width: 22%"> <label>Data Akun</label></th>
                                    <th style="width: 12%"> <label> Rph Saiba</label></th>
                                    <th style="width: 12%"> <label>Rph Simak</label></th>
                                    <th style="width: 12%"> <label>Rph Selisih</label></th>
                                    <th style="width: 12%"> <label>Penjelasan</label></th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($Sp2d53 as $s)
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" class="sub_chk" data-id="{{$s->id}}">
                                        </label>
                                    </td>
                                    <td><label>{{ $i++ }}</label></td>

                                    <td>
                                        <label>Kode : {{$s->kode_satker}}</label>
                                        <br>
                                        <label>Nama : {{$s->nama_satker}}</label>

                                    </td>
                                    <td><label>Akun : {{$s->akun}}</label>
                                        <br>
                                        <label>Uraian : {{$s->no_dokumen}}</label>
                                        <br>
                                        <label>Uraian : {{$s->tgl_dokumen}}</label>
                                    </td>
                                    <td><label>{{$s->rph_saiba}}</label></td>
                                    <td><label>{{$s->rph_simak}}</label></td>
                                    <td><label>{{$s->rph_selisih}}</label></td>
                                    <td><label>{{$s->penjelasan}}</label></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- end content-->
                </div><!--  end card  -->
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