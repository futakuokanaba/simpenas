<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan BEM-VOTE</title>
    <style media="screen">
    *{
      padding: 0;
      margin: 0;
    }
    table td, table th{
      border: 2px solid black;
      padding: 5px;
      text-align: center;
    }
    body{
      height: 100vh;
      width: 1000px;
      margin: 0 auto;
    }
    .container{
      font-family: sans-serif;
      color: black;
      text-align: center;
      word-wrap: break-word;
      padding: 10px;
    }
    table{
      width:750px;
      margin: 0 auto;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Laporan BEM-VOTE Fakultas <?= $fakultas ?></h1>
      <br><br><br>

      <h4>Live Count Fakultas <?= $fakultas ?></h4>
      <table style="width:750px;
      margin: 0 auto;">
        <tr>
          <th>Nama Paslon</th>
          <th>Presentasi suara (%)</th>
          <th>Jumlah suara (Orang)</th>
        </tr>
        <tr>
          <td><?= $paslonSatu->nama_paslon ?></td>
          <td><?= $totalSuaraMasukSatuFakultasStat ?></td>
          <td><?= $totalSuaraMasukSatuFakultas ?></td>
        </tr>
        <tr>
          <td><?= $paslonDua->nama_paslon ?></td>
          <td><?= $totalSuaraMasukDuaFakultasStat ?></td>
          <td><?= $totalSuaraMasukDuaFakultas ?></td>
        </tr>
      </table>

    </div>
  </body>
</html>
