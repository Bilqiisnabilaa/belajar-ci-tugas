<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3>Riwayat Transaksi Pembelian <strong><?= esc($username) ?></strong></h3>
<hr>

<div class="table-responsive">
    <table class="table table-striped datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($buy)) : ?>
                <?php foreach ($buy as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['created_at']) ?></td>
                        <td><?= number_to_currency($item['total_harga'], 'IDR', 'id_ID') ?></td>
                        <td><?= esc($item['alamat']) ?></td>
                        <td>
                            <?= ($item['status'] == "1") 
                                ? '<span class="badge bg-success">Selesai</span>' 
                                : '<span class="badge bg-warning text-dark">Belum Selesai</span>' ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal-<?= esc($item['id']) ?>">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="detailModal-<?= esc($item['id']) ?>" tabindex="-1" aria-labelledby="modalLabel<?= esc($item['id']) ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?= esc($item['id']) ?>">Detail Transaksi #<?= esc($item['id']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <?php if (!empty($product[$item['id']])) : ?>
                                        <?php foreach ($product[$item['id']] as $index2 => $item2) : ?>
                                            <div class="mb-3">
                                                <strong><?= ($index2 + 1) . ") " . esc($item2['nama'] ?? 'Produk tidak dikenal') ?></strong><br>
                                                
                                                <?php if (!empty($item2['foto']) && file_exists(FCPATH . 'img/' . $item2['foto'])) : ?>
                                                    <img src="<?= base_url('img/' . $item2['foto']) ?>" class="img-thumbnail my-2" width="100px">
                                                <?php else : ?>
                                                    <img src="<?= base_url('img/default.jpg') ?>" class="img-thumbnail my-2" width="100px">
                                                <?php endif; ?>

                                                Harga: <?= number_to_currency($item2['harga'] ?? 0, 'IDR', 'id_ID') ?><br>
                                                Jumlah: <?= esc($item2['jumlah'] ?? 0) ?> pcs<br>
                                                Subtotal: <?= number_to_currency($item2['subtotal_harga'] ?? 0, 'IDR', 'id_ID') ?>
                                            </div>
                                            <hr>
                                        <?php endforeach; ?>
                                        <p><strong>Ongkir:</strong> <?= number_to_currency($item['ongkir'] ?? 0, 'IDR', 'id_ID') ?></p>
                                    <?php else : ?>
                                        <p class="text-muted">Tidak ada detail produk dalam transaksi ini.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
