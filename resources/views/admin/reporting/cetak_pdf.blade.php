<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <title>OHS Rank</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   </head>
   <body>
      <h3 class="text-center text-uppercase text-bold mt-3">Hasil Seleksi Sertifikasi OHS</h3>
      <table class="table table-bordered mt-5" width="100%">
         <thead>
            <tr>
               <th style="vertical-align: middle;">Kode</th>
               <th style="vertical-align: middle;">Nama Alternatif</th>
               <th style="vertical-align: middle;">Leaving Flow</th>
               <th style="vertical-align: middle;">Rank</th>
               <th style="vertical-align: middle;">Entering Flow</th>
               <th style="vertical-align: middle;">Rank</th>
               <th style="vertical-align: middle;">Net Flow</th>
               <th style="vertical-align: middle;">Rank</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $rank = 1; 
               foreach ($perhitungan as $key_perhitungan) : 
            ?>
               <tr>
                  <td class="text-center"><?= $key_perhitungan->kode ?></td>
                  <td><?= $key_perhitungan->nama_alternatif ?></td>
                  <td class="text-center"><?= $key_perhitungan->nilai_leavingflow ?></td>
                  <td class="text-center"><?= $key_perhitungan->rank_leavingflow ?></td>
                  <td class="text-center"><?= $key_perhitungan->nilai_enteringflow ?></td>
                  <td class="text-center"><?= $key_perhitungan->rank_enteringflow ?></td>
                  <td class="text-center"><?= $key_perhitungan->nilai_netflow ?></td>
                  <td class="text-center"><?= $rank++ ?></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
         

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   </body>
</html>
