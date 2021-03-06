<!DOCTYPE html>
<html lang="en">
<style>
    * {
        font-family: sans-serif;
        font-size: 12px;
    }
    .logo h1 {
        font-family: sans-serif;
        font-size: 36px;
        margin: 0px;
        color: #2980b9;
        text-shadow: 1px 1px #CCCCCC;
    }
    .logo {
        text-align: center;
    }
    .logo span {
        font-size: 30px;
        font-style: italic;
        color: #848484;
    }
    .logo p{
        margin: 0px;
        color: #B1AEAE;
        padding: 0px;
        font-family: sans-serif;
        font-size: 12px;
        letter-spacing: 1px;
    }
    .row {
        overflow: hidden;
        clear: both;
    }
    .col-md-6 {
        width: 50%;
        float: left;
    }
    .address-company {
        text-align: right;
    }
    .address-company h4 {
        margin: 0px;
        padding: 0px;
    }
</style>
<body>
<table border="0" width="100%">
    <tr>
        <td class="logo">
            <h1>Laporan Hebahan Berita eBuletin UKM<span></span></h1>
            <p>Hebahan Berita Hanya Di Hujung Jari Anda!</p>
        </td>
        <td class="address-company" style="text-align: right">
            <h4>eBuletin UKM </h4>
            <p style="margin-top: 0px;">
                Bandar Baru Bangi <br/>
                Selangor</br>
                Malaysia<br/>
                <br/>
                T +03 8921 5555<br/>
                E www.ukm.my<br/><br/>
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="background: #F1F1F1;padding: 14px;">
            <p style="margin: 0px; font-size: 14px;">
                Tarikh Laporan : {{ $timestamp->format('g:i A, d F Y') }}<br>
            </p>
        </td>
    </tr>
    <tr>
        <td><br></td>
        <td><br></td>
    </tr>
    <tr>
        <td>
            <b>Pengarang:</b>
            {{ Auth::user()->username }}<br>
            
        </td>
        </td>
    </tr>
</table>
<br><br>
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 100%; border-color: #adadad;">
    <thead>
        <tr>
            <th width="2%">Bil</th>
            <th width="8%">Masa Hebahan</th>
            <th width="15%">Tajuk</th>
            <th width="8%">Lokasi</th>
            <th width="10%">Kumpulan Sasaran</th>
        </tr>
    </thead>
    <tbody pull-{right}>
    <?php $i = 0 ?>
                @forelse($beritas as $berita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $berita->created_at->format('d F, Y') }}</td>
                        <td>{{ $berita->tajuk }}</td>
                        <td>{{ $berita->lokasi }}</td>
                        <td>{{ $berita->kumpulan_sasaran }}</td>
                    </tr>
                        <?php $i++ ?>
                        @empty
                    <tr>
                        <td colspan="6">Tiada berita dihebahkan.</td>
                    </tr>

                @endforelse
    </tbody>

</table>
<br/><br/>
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 100%; border-color: #adadad;">
    <tbody>
    <tr>
        <td width="60%" style="text-align: right; font-size: 18px; padding: 10px;">Jumlah Hebahan Berita :</td>
        <td width="40%" style="text-align: right; font-size: 18px; font-weight: bold; padding: 10px;">{{ $count }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>