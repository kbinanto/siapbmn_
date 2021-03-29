<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;

    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

    table.none {

        border: none;

    }

    tr.hide_all>td,
    td.hide_all {
        border-style: hidden;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .page_break {
        page-break-before: always;
    }

    #header {
        position: fixed;
        right: 0px;
        top: -90px;
        text-align: center;
        border-top: 0px solid black;
    }

    #footer {
        position: fixed;
        right: 0px;
        bottom: 10px;
        text-align: center;
        border-top: 0px solid black;
    }

    #footer .page:after {
        content: counter(page, decimal);
    }

    @page {
        margin: 100px 50px 40px 50px;
    }
    </style>
</head>

<body>
    <div id="header">
        <small>
            <p style="font-size: 8; text-align: right;"> &copy; aplikasi SiapBmn versi betta
            </p>
        </small>
    </div>


    <center style="font-family:Arial, Helvetica, sans-serif ;"><b>HASIL ANALISA DATA</b></center>
    <center style="font-family:Arial, Helvetica, sans-serif ;"><b>TELAAH SELISIH REKONSILIASI INTERNAL</b></center>
    <center style="font-family:Arial, Helvetica, sans-serif ;"><b>BASE ON</b></center>
    <center style="font-family:Arial, Helvetica, sans-serif ;"><b>DATA APLIKASI E-REKON</b></center>

    <br>

    <table style="width:100%">
        <thead style="font-size: 10;">
            <tr>
                <th rowspan="4" width="50%">
                    Mahkamah Agung Republik Indonesia
                    <br>
                    Badan Urusan Administrasi
                    <br>
                    Biro Perlengkapan
                    <br>
                    Inventarisasi Kekayaan Negara
                </th>
                <th width="17%">
                    Analis
                </th>
                <th width="2%">
                    :
                </th>
                <th>
                    {{ Auth::user()->name }}
                </th>
            </tr>
            <tr>

                <th width="17%">
                    Verifikator
                </th>
                <th width="2%">
                    :
                </th>
                <th>

                </th>
            </tr>
            <tr>

                <th width="17%">
                    Periode Bulan
                </th>
                <th width="2%">
                    :
                </th>
                <th>
                    {{date("m")}}
                </th>
            </tr>
            <tr>

                <th width="12%">
                    Tgl Analisa
                </th>
                <th width="2%">
                    :
                </th>
                <th>
                    {{date("Y-m-d H:i:s")}}
                </th>
            </tr>
        </thead>
    </table>

    <br>

    <table style="width:100%; font-size: 10; ">
        <tr>
            <th>
                <label> Hasil Analisa Data </label>
            </th>
        </tr>
    </table>

    @foreach($RekonsiliasiInternal as $s)

    <table style="width:100%; font-size: 10; ">
        <tr>
            <td>
                <label>Kode Satker : {{$s->kode_satker}}</label>
                <label>Nama Satker : {{$s->nama_satker}}</label>
                <label>Akun: {{$s->akun}}</label>
                <label>Uraian : {{$s->uraian}}</label>
                <label>Rph Saiba : {{$s->rph_saiba}}</label>
                <label>Rph Simak : {{$s->rph_simak}}</label>
                <label>Rph Selisih : {{$s->rph_selisih}}</label>
                <br><br>
                <label>Penjelasan : {{$s->penjelasan}}</label>
            </td>
        </tr>

    </table>

    <div id="footer">
        <small>
            <p class="page" style="font-size: 8; text-align: right;">
                Halaman :
            </p>
        </small>
    </div>
    @endforeach

    <br>

    <div class="page_break"></div>

    <table style="border:0px; width:100px">
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                (_____________)
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;">
                (_____________)
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;color:white ">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;">
                Kepala Bagian
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;">
                Kepala Sub Bagian
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;">
                (_____________)
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;">
                (_____________)
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px; ">
                Mengetahui
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px; ">
                Kepala Biro Perlengkapan
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px; color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
            <td style="width:  150px;  color:white">
                Analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
        </tr>
        <tr class="hide_all">
            <td style="width: 150px; color:white">
                analis
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
            <td style="width:  150px; ">
                (_____________)
            </td>
            <td style="width:  150px;color:white">
                analis
            </td>
        </tr>
    </table>
</body>

</html>