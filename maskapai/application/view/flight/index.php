<div class="container mt-5">
    <h2 class="mb-4 text-center">Pendaftaran Rute Penerbangan</h2>
    <div class="card border-0 shadow-lg mb-3">
        <div class="card-body">
            <form action="http://<?= $_SERVER['HTTP_HOST'] ?><?= $_SERVER['REQUEST_URI'] ?>" method="POST">
                <div class="row justify-content-center py-5">
                    <div class="col-sm-10">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control border-2 rounded-pill" name="maskapai" id="maskapai" placeholder="Contoh: Garuda Indonesia">
                            <label for="maskapai" style="font-size: 14pt; margin-left: 8px;">Maskapai</label>
                        </div>
                    </div>
                    <div class="col-sm-5 mt-3">
                        <select class="form-select form-select-lg border-2 rounded-pill" name="asal">
                            <option value="">Bandara Asal</option>
                            <?php for ($i = 0; $i < count($data['bandara']->bandara_asal); $i++) {  ?>
                                <option value="<?= $data['bandara']->bandara_asal[$i]->bandara . "$" . $data['bandara']->bandara_asal[$i]->pajak; ?>"><?= $data['bandara']->bandara_asal[$i]->bandara; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-5 mt-3">
                        <select class="form-select form-select-lg border-2 rounded-pill" name="tujuan">
                            <option value="">Bandara Tujuan</option>
                            <?php for ($i = 0; $i < count($data['bandara']->bandara_tujuan); $i++) {  ?>
                                <option value="<?= $data['bandara']->bandara_tujuan[$i]->bandara . "$" . $data['bandara']->bandara_tujuan[$i]->pajak; ?>"><?= $data['bandara']->bandara_tujuan[$i]->bandara; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-10 mt-3 mb-4">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control border-2 rounded-pill" name="harga" id="harga" placeholder="Contoh: Garuda Indonesia">
                            <label for="harga" style="font-size: 14pt; margin-left: 8px;">Harga Tiket</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-grid">
                            <button class="btn btn-danger rounded-pill" type="submit" name="input" value="1">Submit</button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="d-grid">
                            <button class="btn btn-secondary rounded-pill" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


<div class="container mt-5">
    <div class="card border-0 shadow-lg mb-3">
        <div class="card-body">
            <h4 class="mb-4 mt-5 text-center">Daftar Rute Tersedia</h4>
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Maskapai</th>
                                <th>Asal Penerbangan</th>
                                <th>Tujuan Penerbangan</th>
                                <th>Harga Tiket</th>
                                <th>Pajak</th>
                                <th>Total Harga Tiket</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data['rute'] as $rute) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rute[0]; ?></td>
                                        <td><?= $rute[1]; ?></td>
                                        <td><?= $rute[2]; ?></td>
                                        <td>Rp.<?= number_format($rute[3], 0, ',', '.'); ?></td>
                                        <td>Rp.<?= number_format($rute[4], 0, ',', '.'); ?></td>
                                        <td>Rp.<?= number_format($rute[5], 0, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>