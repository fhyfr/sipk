<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css" media="all">
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      background-color: blac;
      display: flex;
      justify-content: center;
      background-color: #313131;
    }

    .slip-gaji {
      width: 750px;
      min-height: 100vh;
      background-color: #fff;
      padding: 20px;
    }

    .slip-gaji .header {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-size: 16px;
    }

    .slip-gaji .content-body .data-karyawan,
    .slip-gaji .content-body .data-karyawan .left,
    .slip-gaji .content-body .data-karyawan .right,
    .slip-gaji .content-body .detail-fee,
    .slip-gaji .content-body .total-fee {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 10px 0;
      font-size: 14px;
    }

    .slip-gaji .content-body .data-karyawan .left .label,
    .slip-gaji .content-body .data-karyawan .right .label {
      font-size: 12px;
    }

    .slip-gaji .content-body .data-karyawan .label {
      margin-right: 10px;
    }

    .slip-gaji .content-body .detail-fee h3 {
      margin-bottom: 10px;
    }

    .slip-gaji .content-body .detail-fee .pendapatan {
      background-color: #FFE1E1;
      padding: 20px;
      flex-basis: 50%;
      margin-right: 10px;
      border-radius: 5px;
      height: 230px;
    }

    .slip-gaji .content-body .detail-fee .potongan {
      background-color: #E1E8FF;
      padding: 20px;
      flex-basis: 50%;
      margin-left: 10px;
      border-radius: 5px;
      height: 230px;
    }

    .slip-gaji .content-body .detail-fee th,
    .slip-gaji .content-body .detail-fee td {
      padding: 5px 10px;
      box-sizing: border-box;
    }

    .slip-gaji .content-body .total-fee {
      align-items: center;
      flex-direction: column;
    }
  </style>

  <title>Slip Gaji</title>
</head>

<body>
  <div class="slip-gaji">
    <div class="header">
      <h2 class="pb-2" style="text-align: center;">Slip Gaji Karyawan</h2>
      <h3 class="brand-name" style="text-align: center;">{{$perusahaan->nama_perusahaan}}</h3>
    </div>
    @foreach($gaji as $g)
    <div class="content-body">
      <div class="data-karyawan">
        <div class="left">
          <div class="label" style="text-align: justify;">
            <h4>No. Slip : <em>{{$slip}}-{{$g->tahun}}</em> </h4>
            <h4>NIK : <em>{{$g->nik}}</em></h4>
            <h4>Nama Karyawan : <em>{{$g->name}}</em></h4>
            <h4>Jabatan : <em>{{$g->jabatan}}</em></h4>
            <h4>Tanggal Cetak : <em>{{$tanggal}}</em></h4>
          </div>
        </div>
      </div>
      <hr>
      <div class="detail-fee">
        <div class="pendapatan">
          <h3>Rincian Pendapatan</h3>
          <table class="table">
            <tbody>
              <tr>
                <th>1</th>
                <td>Gaji Pokok</td>
                <td>=</td>
                <td>Rp {{number_format($g->gaji_pokok, 0)}}</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Tunjangan</td>
                <td>=</td>
                <td>Rp {{number_format($pendapatan->nm_tunjangan, 0)}}</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Uang Makan</td>
                <td>=</td>
                <td>Rp {{number_format(($pendapatan->nm_makan*$g->jml_hadir), 0)}}</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Uang Lembur</td>
                <td>=</td>
                <td>Rp {{number_format(($pendapatan->nm_lembur*$g->jml_lembur), 0)}}</td>
              </tr>
              <tr>
                <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
                <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
                @if ($g->jml_alfa==0 and $g->jml_sakit==0 and $g->jml_izin==0)
                <?php $insentif = $g->insentif; ?>
                @else
                <?php $insentif = 0; ?>
                @endif
                <th scope="row">5</th>
                <td>Insentif</td>
                <td>=</td>
                <td>Rp {{number_format($insentif)}}</td>
              </tr>
              <tr style="font-weight: 800;">
                <th scope="row">6</th>
                <td><strong>Total Pendapatan</strong></td>
                <td>=</td>
                <td><strong>Rp {{number_format(($g->gaji_pokok +
                    $pendapatan->nm_tunjangan +
                    ($pendapatan->nm_makan*$g->jml_hadir) +
                    ($g->jml_lembur*$pendapatan->nm_lembur) + $insentif
                    ), 0)}}</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
        <br>
        <div class="potongan">
          <h3>Rincian Potongan</h3>
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Alfa</td>
                <td>=</td>
                <td>- Rp {{number_format($g->jml_alfa*$potongan->nm_alfa)}}</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Izin</td>
                <td>=</td>
                <td>- Rp {{number_format($g->jml_izin*$potongan->nm_izin)}}</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Sakit</td>
                <td>=</td>
                <td>- Rp {{number_format($g->jml_sakit*$potongan->nm_sakit)}}</td>
              </tr>
              <tr style="font-weight: 800;">
                <th scope="row">4</th>
                <td><strong>Total Potongan</strong></td>
                <td>=</td>
                <td><strong>Rp {{number_format(($g->jml_alfa*$potongan->nm_alfa)+($g->jml_izin*$potongan->nm_izin)+($g->jml_sakit*$potongan->nm_sakit) ,0)}}</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="total-fee" style="text-align: center;">
        <h3>Total yang dibayarkan <strong>Rp {{number_format
              (
              (
                ($g->gaji_pokok + 
                $pendapatan->nm_tunjangan + 
                ($pendapatan->nm_makan*$g->jml_hadir) +
                ($g->jml_lembur*$pendapatan->nm_lembur) + $insentif
              ) 
              - 
              (
                ($g->jml_alfa*$potongan->nm_alfa)+($g->jml_izin*$potongan->nm_izin)+($g->jml_sakit*$potongan->nm_sakit)
              )
              ), 0)
            }}</strong></h3>
        <p><em>Mengetahui,</em></p>
        <h3 class="owner">Pimpinan Perusahaan</h3>
        <p>{{$perusahaan->nama_pimpinan}}</p>
      </div>
    </div>
    <hr>
    <br>
    @endforeach
  </div>
</body>

</html>