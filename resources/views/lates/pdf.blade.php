<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            color: black;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .signature {
            margin-top: 50px;
            width: 200px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        .footer {
            margin-top: 50px;
        }
        ul li {
            list-style: none;
        }
        .name{
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .row{
            display: flex;
            justify-content: space-between;
        }
        .col-1{
            display: flex;
            flex-direction: column;
        }
        .col-1{
            display: flex;
            flex-direction: column;
        }
        .ps{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="title">
        SURAT PERNYATAAN <br>
        TIDAK AKAN DATANG TERLAMBAT SEKOLAH
    </div>
    <div class="content">
        <p>Yang bertanda tangan di bawah ini:</p>
        <ul>
            <li>NIS: {{ $student->nis }}</li>
            <li>Nama: {{ $student->name }}</li>
            <li>Rombel: {{ $student->rombel->rombel }}</li>
            <li>Rayon: {{ $student->rayon->rayon }}</li>
        </ul>
        <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak <strong>{{ $total_keterlambatan }}</strong> kali yang mana hal tersebut termasuk kedalam pelanggaran kedisplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>
        <p>Demikian surat pernyataan ini saya buat dengan penuh penyesalan.</p>
    </div>
<div class="row">
    <div class="col-1">
    <div class="participant">
        <p>Peserta Didik</p>
        <p class="name">({{ $student->name }})</p>
    </div>
    <div class="counselor">
        <p class="ps">Pembimbing Siswa</p>
        <div class="signature"></div>
        <p>{{ $student->rayon->user->name }}</p>
    </div>
</div>
    <div class="col-2">
    <div class="footer">
        <p>(Tanggal surat ini dibuat)</p>
        <p>Orang Tua/Wali Peserta Didik</p>
        <div class="signature"></div>
        <p>(....................)</p>
        <p>Kesiswaan</p>
        <div class="signature"></div>
        <p>(....................)</p>
    </div>
    </div>
</div>
</body>
</html>
