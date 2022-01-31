<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $event->code }}.pdf</title>
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: arial, sans-serif;
            font-size: 12pt;
        }

        body.A3 {
            width: 297mm;
            height: 420mm
        }

        body.A3.landscape {
            width: 420mm;
            height: 297mm
        }

        body.A4 {
            width: 210mm;
            height: 297mm
        }

        body.A4.landscape {
            width: 297mm;
            height: 210mm
        }

        body.A5 {
            width: 148mm;
            height: 210mm
        }

        body.A5.landscape {
            width: 210mm;
            height: 148mm
        }

        body.letter {
            width: 216mm;
            height: 280mm
        }

        body.letter.landscape {
            width: 280mm;
            height: 216mm
        }

        body.legal {
            width: 216mm;
            height: 357mm
        }

        body.legal.landscape {
            width: 357mm;
            height: 216mm
        }

        hr {
            padding: 0 !important;
            margin: 0 !important;
            height: .1mm;
            background-color: white;
            border: none;
        }

        p {
            color: white;
            margin: 0;
        }

        .page {
            min-height: 210mm;
        }


        tr,
        th,
        td {
            margin: 0;
            padding: 2px;
            vertical-align: top;
            border: .1mm solid transparent;
        }

        @page {
            margin: 0;
        }
    </style>
</head>

<body class="A4 landscape">
    <section class="page">
        <table style="margin:200px; width:60%; border:1px solid black; padding:40;">
            <tbody>
                <tr>
                    <td>
                        <h4>Nama Penyelenggara</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->user->name }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Fakultas</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->user->faculty }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Lokasi Peminjaman</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->unit->facility->name }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Unit Peminjaman</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->unit->name }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Tanggal Peminjaman</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->start->format('d M Y') }} s/d {{ $event->end->format('d M Y') }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Acara Kegiatan</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->title }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Jenis Kegiatan</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->type }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Waktu KegiatanTanggal Peminjaman</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->start->format('H:i:s') }} s/d {{ $event->end->format('H:i:s') }}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>No. Telp</h4>
                    </td>
                    <td>
                        <h4>: {{ $event->user->phone }}</h4>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>