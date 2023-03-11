<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-1 mb-2">
            <img src="assets/img/flight.png" alt="Logo" width="64" height="48" class="d-inline-block align-text-top">
        </div>
        <div class="col-sm-12">
            <h2 class="mb-4 text-center">PO. AMAN JAYA</h2>
        </div>
    </div>
    <div class="card border-0 shadow-lg mb-3">
        <div class="card-body">
            <form action="http://<?= $_SERVER['HTTP_HOST'] ?><?= $_SERVER['REQUEST_URI'] ?>" method="POST">
                <div class="row justify-content-center py-5">
                    <div class="col-sm-10">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control border-2 rounded-pill" name="ktp" id="ktp" placeholder="Contoh: Garuda Indonesia">
                            <label for="ktp" style="font-size: 14pt; margin-left: 8px;">Nomor KTP</label>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control border-2 rounded-pill" name="nama" id="nama" placeholder="Contoh: John Doe">
                            <label for="nama" style="font-size: 14pt; margin-left: 8px;">Nama</label>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="form-floating mb-4">
                            <textarea class="form-control border-2 rounded-pill" placeholder="Leave a comment here" name="alamat" id="alamat"></textarea>
                            <label for="alamat" style="font-size: 14pt; margin-left: 8px;">Alamat</label>
                        </div>
                    </div>

                    <div class="col-sm-5 mb-4">
                        <input type="date" class="form-control form-control-lg border-2 rounded-pill" name="tgl-berangkat" id="tgl-berangkat">
                        <label for="tgl-berangkat" style="font-size: 8pt; margin-left: 8px;">Tanggal Berangkat</label>
                    </div>

                    <div class="col-sm-5 mb-4">
                        <?php $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']; ?>
                        <!-- <input type="text" class="form-control form-control-lg border-2 rounded-pill" name="hari" id="hari" disabled value="Hari Akan Generate Otomatis"> -->
                        <select class="form-select form-select-lg border-2 rounded-pill" id="hari" name="hari">
                            <option value="">Hari</option>
                            <?php for ($i = 0; $i < count($hari); $i++) {  ?>
                                <option value="<?= $hari[$i]; ?>"><?= $hari[$i]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-10 mb-4">
                        <div class="form-floating">
                            <input type="number" class="form-control border-2 rounded-pill" name="jml-penumpang" id="jml-penumpang" placeholder="Contoh: Garuda Indonesia">
                            <label for="jml-penumpang" style="font-size: 14pt; margin-left: 8px;">Jumlah Penumpang</label>
                        </div>
                    </div>

                    <div class="col-sm-5 mb-4">
                        <select class="form-select form-select-lg border-2 rounded-pill" id="jurusan" name="jurusan">
                            <option value="">Jurusan</option>
                            <?php for ($i = 0; $i < count($data['master']); $i++) {  ?>
                                <option value="<?= $data['master'][$i]->jurusan . "$" . $data['master'][$i]->tarif . '$' . $data['master'][$i]->diskon; ?>"><?= $data['master'][$i]->jurusan; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-5 mb-5">
                        <div class="form-floating">
                            <input type="number" class="form-control border-2 rounded-pill" name="tarif" id="tarif" placeholder="Contoh: Garuda Indonesia">
                            <label for="tarif" style="font-size: 14pt; margin-left: 8px;">Tarif Tiket</label>
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
            <h4 class="mb-4 mt-5 text-center">Daftar Tiket</h4>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <!-- LIST HARGA -->
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Jurusan</th>
                                        <?php for ($i = 0; $i < count($data['master']); $i++) { ?>
                                            <th class="text-center"><?= $data['master'][$i]->jurusan; ?></th>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th>Tarif</th>
                                        <?php for ($i = 0; $i < count($data['master']); $i++) { ?>
                                            <td class="text-center">Rp.<?= number_format($data['master'][$i]->tarif, 0, ',', '.'); ?></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th>Diskon (Jumlah Penumpang > 5)</th>
                                        <?php for ($i = 0; $i < count($data['master']); $i++) { ?>
                                            <td class="text-center"><?= $data['master'][$i]->diskon * 100 . "%"; ?></td>
                                        <?php } ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LIST PENJUALAN -->
            <h4 class="text-center mb-3 mt-5">Daftar Penumpang</h4>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">No. KTP</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Hari</th>
                                    <th class="text-center">Tgl Berangkat</th>
                                    <th class="text-center">Jurusan</th>
                                    <th class="text-center">Jumlah Penumpang</th>
                                    <th class="text-center">Tarif Tiket</th>
                                    <th class="text-center">Dsikon</th>
                                    <th class="text-center">Total Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (count($data['penumpang']) == 0) { ?>
                                    <tr class="text-center">
                                        <td colspan="11">
                                            <h5 class="fs-6 my-3"><i>No Data Available</i></h5>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <?php foreach ($data['penumpang'] as $penumpang) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $penumpang->ktp; ?></td>
                                            <td><?= $penumpang->nama; ?></td>
                                            <td><?= $penumpang->alamat; ?></td>
                                            <td><?= $penumpang->hari; ?></td>
                                            <td><?= date('d F Y', strtotime($penumpang->tgl_berangkat)); ?></td>
                                            <td><?= $penumpang->jurusan; ?></td>
                                            <td><?= $penumpang->jml_penumpang; ?></td>
                                            <td>Rp.<?= number_format($penumpang->tarif, 0, ',', '.'); ?></td>
                                            <td>Rp.<?= number_format(intval($penumpang->diskon), 0, ',', '.'); ?></td>
                                            <td>Rp.<?= number_format($penumpang->total_bayar, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>