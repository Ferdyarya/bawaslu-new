<!DOCTYPE html>
<html>

<head>
    <title>Surat Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="shortcut icon" href="/img/cropped-logo_5e7c48724a6631.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .address {
            font-size: 14px;
            line-height: 1.5;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: none;
            padding: 8px;
        }

        .signature {
            margin-top: 40px;
            text-align: center;
        }

        .signature p {
            margin-bottom: 5px;
        }

        .atas {
            border-bottom: 5px solid #000;
            padding: 2px;
        }

        @page {
            size: A4;
            margin: 1cm;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
            }

            .signature {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="atas" width="100%">
            <tr>
                <td><img src="/img/cropped-logo_5e7c48724a6631.png" width="150px"></td>
                <td class="tengah" style="text-align: center;">
                    <h1 class="p1"><b>BAWASLU</b></h1>
                    <h3 class="p1">Badan Pengawas Pemilihan Umum</h3>
                    <h1 class="p1"></h1>
                    <h5 class="p1">Jalan Taisir, Sungai Sipai, Kec. Martapura, Kabupaten Banjar, Kalimantan Selatan 70714.</h5>
                </td>
            </tr>
        </table>
    </div>
<br>
<table border="0" align="center">
    <tr>
        <td>
            <center>
                <font size="4"><b>SURAT TUGAS</b></font><br>
                <span>Nomor :{{ $item->nosurat }} </span>
            </center>
        </td>
    </tr>
</table>
<br>
<br>
<table border="0" align="center" style="width: 100%;">
    <tr>
        <td style="text-align: left; padding-left: 100px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Ketua BAWASLU Kabupaten Banjar, Menerangkan bahwa menugaskan kepada  :
        </td>
    </tr>
</table>
<br>
<table border="0" align="left">
    <tr>
        <td style="text-align: right; width: 400px;">Nama</td>
        <td style="text-align: left; width: 50px;">:</td> <!-- Sesuaikan nilai padding -->
        <td>{{ $item->petugas_lapangan->nama }}</td>
    </tr>
    <tr>
        <td style="text-align: right; width: 400px;">Tanggal Tugas</td>
        <td style="text-align: left; width: 50px;">:</td>
        <td>{{ date('d F Y', strtotime($item->tgltugas)) }}</td> <!-- Tambahkan penutup tag td yang hilang -->
    </tr>
    <tr>
        <td style="text-align: right; width: 400px;">Tanggal Pelaksanaan</td>
        <td style="text-align: left; width: 50px;">:</td>
        <td>{{ date('d F Y', strtotime($item->tglpelaksana)) }}</td> <!-- Tambahkan penutup tag td yang hilang -->
    </tr>
    <tr>
        <td style="text-align: right; width: 400px;">Jabatan</td>
        <td style="text-align: left; width: 50px;">:</td>
        <td>{{ $item->petugas_lapangan->jabatan }}</td> <!-- Tambahkan penutup tag td yang hilang -->
    </tr>
    {{-- <tr>
        <td>Tanggal Tugas</td>
        <td>:</td>
        <td>{{ $item->tgltugas }}</td>
    </tr>
    <tr>
        <td>Tanggal Pelaksanaan</td>
        <td>:</td>
        <td>{{ $item->tglpelaksana }}</td>
    </tr>
    <tr>
        <td>Tujuan Penugasan</td>
        <td>:</td>
        <td>{{ $item->tujuan }}</td>
    </tr>
    <tr>
        <td>Status Warga</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Keperluan</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
    </tr> --}}
</table>
<br>
<table border="0" style="width: 100%;">
    <tr>
        <td style="text-align: left; padding-left: 100px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menugaskan kepada nama tersebut melaksanakan tugas yang diamanatkan dengan sungguh-sungguh dan penuh tanggung jawab. Tugas <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ini dilaksanakan dari {{ date('d F Y', strtotime($item->tglmulai)) }} s.d {{ date('d F Y', strtotime($item->tglselesai)) }}</td>
    </tr>
    <tr>
        <td style="text-align: left; padding-left: 100px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat tugas ini disampaikan kepada yang bersangkutan untuk dapat dilaksanakan serta digunakan sebagaimana mestinya. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sekian dan terima kasih.
        </td>
    </tr>
</table>
<br>
<br>
<br>
<table border="0" align="center">
    <tr>
        <th style="text-align: center;"></th>
        <th style="text-align: center;" width="100px"></th>
        <th style="text-align: center;">Martapura,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date(' F Y', strtotime($item->updated_at)) }}</th>
    </tr>
    <tr>
        <td style="text-align: center;"></td>
        <td style="text-align: center;" class="signature-column"></td>
        <td style="text-align: center;">Ketua Bawaslu Kabupaten Banjar</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
        <td style="text-align: center;" colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align: center;"><b style="text-transform:uppercase"><u></u></b></td>
        <td style="text-align: center;"></td>
        <td style="text-align: center;"><b><u>Muhammad Hafizh Ridha, S.H</u></b></td>
    </tr>
</table>

<style>
    .signature-column {
        width: 500px; /* Atur lebar kolom tanda tangan sesuai kebutuhan */
    }
</style>
<script>
    window.onload = function () {
        window.print();
    };
</script>
</body>
    </html>
 