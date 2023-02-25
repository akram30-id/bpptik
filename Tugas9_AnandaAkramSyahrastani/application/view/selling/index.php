<!-- INPUT PENJUALAN -->
<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="card border-0 shadow-lg rounded">
            <div class="card-body p-5">

                <form action="http://<?= $_SERVER['HTTP_HOST'] ?><?= $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="nama-pembeli" class="form-label fw-semibold">Nama Pembeli</label>
                                <input type="text" class="form-control" name="nama-pembeli" id="nama-pembeli" placeholder="Masukkan Nama Pembeli">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="buah" class="form-label fw-semibold">Buah</label>
                                <select class="form-select" aria-label="Default select example" name="buah">
                                    <option value="">Pilih Buah</option>
                                    <?php foreach ($data['buah']->response->data as $buah) { ?>
                                        <option value="<?= $buah->harga; ?>-<?= $buah->buah; ?>"><?= $buah->buah; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="jumlah-beli" class="form-label fw-semibold">Jumlah Beli</label>
                                <input type="number" class="form-control" name="jumlah-beli" id="jumlah-beli" placeholder="Masukkan Jumlah Beli" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-sm-8">
                            <div class="d-grid">
                                <input class="btn btn-primary rounded-pill" name="hitung" type="submit" value="Hitung"></input>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="d-grid">
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-4">
    <div class="col-sm-8">
        <div class="card border-0 rounded shadow-lg">
            <div class="card-body p-5">

                <!-- LIST HARGA -->
                <h4 class="text-center mb-3 mt-5">Tabel Harga</h4>
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <table class="table table-striped table-hover">
                            <tr>
                                <?php foreach ($data['buah']->response->data as $buah) { ?>
                                    <th class="text-center"><?= $buah->buah; ?></th>
                                <?php } ?>
                            </tr>
                            <tr>
                                <?php foreach ($data['buah']->response->data as $buah) { ?>
                                    <td class="text-center"><?= $buah->harga; ?></td>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- LIST PENJUALAN -->
                <h4 class="text-center mb-3 mt-5">Daftar Penjualan</h4>
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Pembeli</th>
                                        <th class="text-center">Nama Buah</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Pajak</th>
                                        <th class="text-center">Total Bayar</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php if (count($data['customer']->response->data) == 0) { ?>
                                        <tr class="text-center">
                                            <td colspan="9">
                                                <h5 class="fs-6 my-3"><i>No Data Available</i></h5>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <?php foreach ($data['customer']->response->data as $customer) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $customer->pembeli; ?></td>
                                                <td><?= $customer->buah; ?></td>
                                                <td><?= $customer->jumlah; ?></td>
                                                <td><?= $customer->harga; ?></td>
                                                <td><?= $customer->total; ?></td>
                                                <td><?= $customer->pajak; ?></td>
                                                <td><?= $customer->total_bayar; ?></td>
                                                <td>
                                                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?><?= $_SERVER['REQUEST_URI'] ?>?customer=<?= $customer->id ?>" class="btn btn-sm btn-danger" style="width: 32px;"><i class="bi bi-trash3-fill"></i></a>
                                                </td>
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
    <div class="mb-5"></div>
</div>