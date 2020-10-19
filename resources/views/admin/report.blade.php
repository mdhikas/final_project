<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/dist/css/my-config.css">
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 ml-auto mr-auto">
                            <div>
                            {{-- <img src="/dist/img/sbi.jpg"> --}}
                            <table class="table table-bordered table-hover table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">No</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">C/NC</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Course Group</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Nama Pelatihan</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Provider</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Tgl Mulai</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Tgl Selesai</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Jumlah Peserta</th>
                                        <th style="vertical-align : middle;text-align:center;" colspan="3">Kriteria</th>
                                        <th style="vertical-align : middle;text-align:center;" rowspan="2">Anggaran</>
                                    </tr>
                                    <tr>
                                        <th>I</th>
                                        <th>P</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align:center">
                                    <tr>
                                        <th>1</th>
                                        <td>20973SBI2</td>
                                        <td>Air</td>
                                        <td>Manajer Pengendalian Pencemaran Air (MPPA)</td>
                                        <td>BNSP</td>
                                        <td>24-02-2020</td>
                                        <td>28-02-2020</td>
                                        <td>53</td>
                                        <td></td>
                                        <td>P</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>20973SBI5</td>
                                        <td>Air</td>
                                        <td>Operasional Pengendalian Pencemaran Air (Operator)</td>
                                        <td>BNSP</td>
                                        <td>06-02-2020</td>
                                        <td>10-02-2020</td>
                                        <td>41</td>
                                        <td>I</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>20973SBI1</td>
                                        <td>Udara</td>
                                        <td>Penanggung Jawab Pengendalian Pencemaran Udara (PPPU)
                                        </td>
                                        <td>BNSP</td>
                                        <td>06-02-2020</td>
                                        <td>10-02-2020</td>
                                        <td>41</td>
                                        <td></td>
                                        <td>P</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>