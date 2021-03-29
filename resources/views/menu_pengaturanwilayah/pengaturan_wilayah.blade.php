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

                <a class="navbar-brand" href="#pablo">Pengaturan Wilayah</a>
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
                        <h4 class="card-title">Pengaturan Wilayah</h4>

                    </div>
                    <div class="card-body">

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%"> <label>No</label></th>
                                    <th style="width: 5%"> <label>Id</label></th>
                                    <th style="width: 5%"> <label>Baes1</label></th>
                                    <th style="width: 11%"> <label>Wilayah Satker</label></th>
                                    <th style="width: 10%"> <label>Kode Satker</label></th>
                                    <th style="width: 20%"> <label>Nama Satker</label></th>
                                    <th style="width: 15%"> <label>Kode Pembina</label></th>
                                    <th style="width: 5%"> <label>Action</label></th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%"> <label>No</label></th>
                                    <th style="width: 5%"> <label>Id</label></th>
                                    <th style="width: 5%"> <label>Baes1</label></th>
                                    <th style="width: 11%"> <label>Wilayah Satker</label></th>
                                    <th style="width: 10%"> <label>Kode Satker</label></th>
                                    <th style="width: 20%"> <label>Nama Satker</label></th>
                                    <th style="width: 15%"> <label>Kode Pembina</label></th>
                                    <th style="width: 5%"> <label>Action</label></th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($Referensi_wilayah as $s)
                                <tr>

                                    <td><label>{{ $i++ }}</label></td>

                                    <td>
                                        <label>{{$s->id}}</label>

                                    </td>
                                    <td><label> {{$s->baes1}}</label>

                                    </td>
                                    <td><label>{{$s->wilayah_satker}}</label></td>
                                    <td><label>{{$s->kode_satker}}</label></td>
                                    <td><label>{{$s->nama_satker}}</label></td>
                                    <td><label>{{$s->kode_pembina}}</label></td>
                                    <td><a href="{{url('/Pengaturan_wilayah/edit/'.$s->id)}}"
                                            class="btn btn-warning">update</a>
                                    </td>
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