<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Pesanan</h2>
		</div>
		<div class="row clearfix">
			
			<div class="col-md-12" id="tambah-pesanan-card" hidden="">
				<div class="card">
					<form id="tambah-pesanan-form">
						<div class="header">
							<div class="pull-left loading-container"></div>
							<div class="pull-right"><a href="#" id="tutup-tab" class="text-danger"><i class="fa fa-times fa-2x"></i></a></div>
							<div class="clearfix"></div>
							<br>
							<select class="ms" name="namapelanggan" required=""></select>
						</div>
						<div class="body">
							<table class="table table-sm table-bordered">
								<thead>
									<tr>
										<th>Menu</th>
										<th>Jumlah Beli</th>
										<th class="text-center"><a href="#" class="text-success" id="tambah-tab-input" title="tambah kolom"><i class="fa fa-fw fa-plus"></i></a></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
								<tfoot>
									<tr id="button-form-pesanan" hidden="">
										<td colspan="2"></td>
										<td style="text-align: center;">
											<button type="submit" class="btn btn-primary btn-sm waves-effect">Tambah</button>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<div class="pull-left">
							<i class="fa fa-fw fa-shopping-cart"></i> Data pesanan
						</div>
						<div class="pull-right">
							<button class="btn btn-sm bg-pink waves-effect" id="buka-tab-tambah-pesanan"><i class="fa fa-fw fa-plus"></i> Tambah Pesanan</button>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="body">
						<table class="table table-bordered table-hovered table-pesanan" width="100%">
							<thead>
								<tr>
									<th>ID pesanan</th>
									<th>Kodepesanan</th>
									<th>Nama Pelanggan</th>
									<th>Menu</th>
									<th>Qty</th>
									<th>Total (Rp)</th>
									<th>Dibuat</th>
									<th>Aksi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>