<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Laporan</title>
</head>

<style type="text/css" media="all">
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  p {
    font-size: 10px;
  }

  th {
    font-size: 40px;
  }

  td {
    font-size: 35px;
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

  .slip-gaji .content-body .detail-fee {
    display: flex;
    justify-content: center;
    background-color: #e1e8ff;
    margin: 20px 0;
    padding: 20px 0;
    border-radius: 5px;
  }

  .slip-gaji .content-body .detail-fee h3 {
    margin-bottom: 10px;
  }

  .slip-gaji .content-body .detail-fee th,
  .slip-gaji .content-body .detail-fee td {
    padding: 10px 50px;
  }

  .slip-gaji .content-body .detail-fee .number-column {
    padding: 10px 10px;
  }

  .slip-gaji .content-body .data-karyawan .table-box {
    display: flex;
    justify-content: center;
  }

  .slip-gaji .content-body .total-fee {
    align-items: center;
    flex-direction: column;
  }
</style>

<body>
  <div class="slip-gaji">
    <div class="header" style="text-align: center;">
      <h5>Laporan Pengeluaran Keuangan</h5>
      <h6 class="brand-name">{{$perusahaan->nama_perusahaan}}</h6>
    </div>
    <div class="content-body">
      <div class="data-karyawan" style="text-align:start;">
        <div class="left">
          <div class="label">
            <h5>Bulan : {{$bulan}}</h5>
            <h5>Tahun : {{$tahun}}</h5>
            <h5>Tanggal Cetak : {{$tanggal}}</h5>
          </div>
        </div>
      </div>
      <hr>
      <div class="detail-fee">
        <table class="table">
          <thead>
            <tr>
              <th class="number-column">No</th>
              <th class="center" scope="col">Nama Karyawan</th>
              <th class="center" scope="col">Jabatan</th>
              <th class="center" scope="col">Gaji Pokok</th>
              <th class="center" scope="col">Tunjangan</th>
              <th class="center" scope="col">Uang Makan</th>
              <th class="center" scope="col">Lembur</th>
              <th class="center" scope="col">Insentif</th>
              <th class="center" scope="col">Potongan</th>
              <th class="center" scope="col">Gaji Bersih</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            $i = 0;
            ?>
            @foreach($gaji as $g)
            <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
            @if ($g->jml_alfa==0 and $g->jml_sakit==0 and $g->jml_izin==0)
            <?php $insentif = $g->insentif; ?>
            @else
            <?php $insentif = 0; ?>
            @endif

            <?php
            $i++;
            $total = $total + (
              ($g->gaji_pokok +
                $pendapatan->nm_tunjangan +
                ($pendapatan->nm_makan * $g->jml_hadir) +
                ($g->jml_lembur * $pendapatan->nm_lembur) + $insentif)
              -
              (
                ($g->jml_alfa * $potongan->nm_alfa) + ($g->jml_izin * $potongan->nm_izin) + ($g->jml_sakit * $potongan->nm_sakit)))
            ?>
            <tr>
              <td class="number-column">{{$i}}</td>
              <td class="left">{{$g->name}}</td>
              <td class="left">{{$g->jabatan}}</td>
              <td class="left">Rp{{number_format($g->gaji_pokok, 0)}}</td>
              <td class="left">Rp{{number_format($pendapatan->nm_tunjangan, 0)}}</td>
              <td class="left">Rp{{number_format(($pendapatan->nm_makan*$g->jml_hadir), 0)}}</td>
              <td class="left">Rp{{number_format(($pendapatan->nm_lembur*$g->jml_lembur), 0)}}</td>
              <td class="left">
                <!-- Jika jumlah alfa,sakit, dan izin sama dengan nol maka akan dapat insentif -->
                @if ($g->jml_alfa==0 and $g->jml_sakit==0 and $g->jml_izin==0)
                <?php $insentif = $g->insentif; ?>
                @else
                <?php $insentif = 0; ?>
                @endif

                Rp{{number_format($insentif)}}
              </td>
              <td class="left">-Rp{{number_format(($g->jml_alfa*$potongan->nm_alfa)+($g->jml_izin*$potongan->nm_izin)+($g->jml_sakit*$potongan->nm_sakit) ,0)}}</td>

              <td class="left">Rp{{number_format
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
            }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="total-fee" style="text-align: center;">
        <h6>Total yang dibayarkan Rp{{number_format($total, 0)}}</h6>
        <p><em>Mengetahui,</em></p>
        <h6 class="owner">Pimpinan Perusahaan</h6>
        <p>{{$perusahaan->nama_pimpinan}}</p>
      </div>
    </div>
  </div>
</body>

</html>