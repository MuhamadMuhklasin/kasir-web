<!-- modal tambah transaksi -->
<div class="modal fade" id="tambah-transaksi">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form>
				<div class="modal-header"><div class="modal-title">Cari ID / Nama Pemesan menu</div></div>
				<div class="modal-body">
					<select class="sm" name="idpesanan" required=""></select>
					<p class="text-info text-italic" style="font-size: 12px;">* angka didalam kurung siku "[]" setelah nama pelanggan adalah idpesanan dari pelanggan tersebut </p>
				</div>
				<div class="modal-footer">
					<div class="pull-left"><div class="loading-container"></div></div>
					<div class="pull-right">
						<button class="btn btn-primary btn-sm waves-efffect" type="submit">Lanjutkan</button>
						<button class="btn btn-default btn-sm waves-efffect" data-dismiss="modal">Batal</button>
					</div>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="konfirmasi-transaksi">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>

				<input type="hidden" name="pesanan_idpesanan">
				<input type="hidden" name="total">
				<input type="hidden" name="bayar">

				<div class="modal-header"><div class="modal-title text-danger"></div></div>
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-md-8">
							<ul class="list-group"></ul>
						</div>
						<div class="col-md-4">
							<div class="pull-left">
								<div class="text-bold">Total</div>
								<h4 class="text-success total-bayar"></h4>
								<div class="text-bold">Kembalian</div>
								<h4 class="text-danger kembalian">Rp. 0</h4>
							</div>
							<div class="pull-right">
								<br><br>
								<br><br>
								<p> </p>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" autofocus="" name="input-total-bayar" id="numberFormat" required="">
										<label class="form-label">Uang yang di bayarkan</label>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="pull-left">
						<div class="loading-container"></div>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm btn-primary waves-efffect" type="submit">Bayar</button>
						<button class="btn btn-default btn-sm waves-efffect" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="transaksi-sukses">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item"><b>Total :</b> <span class="output"></span></li>
					<li class="list-group-item"><b>Pembayaran :</b> <span class="output"></span></li>
					<li class="list-group-item"><b>Kembalian :</b> <span class="output"></span></li>
				</ul>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-default waves-efffect" data-dismiss="modal">Selesai</button>
			</div>
		</div>
	</div>
</div>

<!-- modal tambah pelanggan -->
<div class="modal fade" id="tambah-pelanggan">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header"><p class="modal-title"></p></div>
			<?php echo form_open() ?>
			<div class="modal-body">
				
				<label>Nama Pelanggan</label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" spellcheck="false" autocomplete="off" name="namapelanggan" autofocus="" required="" class="form-control">
					</div>
				</div>

				<label>Jenis Kelamin</label><br>
				<input type="radio" value="1" checked="" name="jeniskelamin" id="radio1">
				<label for="radio1">Pria</label><br>
				<input type="radio" value="0" name="jeniskelamin" id="radio2">
				<label for="radio2">Wanita</label><br>

				<label>Nomor Handphone</label>
				<div class="form-group">
					<div class="form-line">
						<input type="number" name="nohp" class="form-control" required="">
					</div>
				</div>

				<label>Alamat</label>
				<div class="form-group">
					<div class="form-line limit-value" data-limit="100">
						<textarea rows="4" name="alamat" class="form-control" required=""></textarea>
							
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-left loading-container"></div>
				<div class="pull-right">
					<button class="btn btn-primary btn-sm waves-efffect" type="submit">Tambah</button>
					<button class="btn btn-default btn-sm waves-efffect" data-dismiss="modal" type="button">Tutup</button>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- modal edit pelanggan -->
<div class="modal fade" id="edit-pelanggan">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-body">
				
					<input type="hidden" name="idpelanggan">

					<label>Nama Pelanggan</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="namapelanggan" autofocus="" required="" class="form-control">
						</div>
					</div>

					<label>Jenis Kelamin</label><br>
					<input type="radio" value="1" checked="" name="jeniskelamin" id="radio1">
					<label for="radio1">Pria</label><br>
					<input type="radio" value="0" name="jeniskelamin" id="radio2">
					<label for="radio2">Wanita</label><br>

					<label>Nomor Handphone</label>
					<div class="form-group">
						<div class="form-line">
							<input type="number" name="nohp" class="form-control" required="">
						</div>
					</div>

					<label>Alamat</label>
					<div class="form-group">
						<div class="form-line limit-value" data-limit="100">
							<textarea rows="4" name="alamat" class="form-control" required=""></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="pull-left loading-container"></div>
					<div class="pull-right">
						<button class="btn btn-primary btn-sm waves-efffect" type="submit">Edit</button>
						<button class="btn btn-default btn-sm waves-efffect" data-dismiss="modal" type="button">Tutup</button>
					</div>
					<div class="clearfix"></div>	
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal tambah menu -->
<div class="modal fade" id="tambah-menu">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form>
				<div class="modal-header"><p class="modal-title"></p></div>
				<div class="modal-body">
					<label>Nama menu</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" autocomplete="off" spellcheck="false" name="namamenu" required="" class="form-control" autofocus="">
						</div>
					</div>

					<label>Harga (Rp)</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="harga" required="" class="form-control" id="numberFormat">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="pull-right">
					<div class="loading-container"></div>
					</div>

					<div class="pull-right">
						<button type="submit" class="btn btn-sm waves-effect btn-primary">Tambah</button>
						<button type="button" data-dismiss="modal" class="btn btn-default btn-sm waves-effect">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- load menu yang akan di update -->
<div class="modal fade" id="modal-update-menu">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form>
			<div class="modal-body">
				<input type="hidden" name="idmenu">

				<label>Namamenu</label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="namamenu" required="" class="form-control" autofocus="">
					</div>
				</div>

				<label>Harga</label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="harga" id="numberFormat" required="" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-left">
					<div class="loading-container"></div>
				</div>
				<div class="pull-right">
					<button class="btn btn-primary btn-sm waves-effect" type="submit">Edit</button>
					<button class="btn btn-default waves-effect btn-sm" data-dismiss="modal">Batal</button>
				</div>
				<div class="clearfix"></div>
			</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

	// load data menu and pelanggan

	var menuSelect =  () => {
		$("select[name='idmenu[]']").select2({
			width : "100%",
			placeholder : "Pilih menu...",
			ajax : {
				url : "<?php echo base_url('admin/load_handle/touch/load_menu') ?>",
				type : "POST",
				dataType : "JSON",
				data : function(params) {
					return {
						search : params.term,
						tipe : "select2"
					}
				},
				processResults : function(data) {
					return {
						results : data.items
					}
				}
			}
		});
	}

	$("select[name='namapelanggan']").select2({
		width : "100%",
		placeholder : "Cari pelanggan Nama / ID",
		tags : true,
		ajax : {
			url : "<?php echo base_url('admin/load_handle/touch/pelanggan') ?>",
			type : "POST",
			dataType : "JSON",
			data : function(params) {
				return {
					search : params.term,
					tipe : "select2"
				}
			},
			processResults : function(data) {
				return {
					results : data.items
				}
			}
		}
	}).on("select2:select", function(e) {
		let id = e.params.data.id;

		$.ajax({
			url : "<?php echo base_url('admin/load_handle/touch/part_pelanggan') ?>",
			data : {idpelanggan : id},
			type : "POST",
			beforeSend : function() {
				$(".loading-container").text("Loading...");
			},
			success : function(data) {
				data = JSON.parse(data);
				if(data.length < 1) {
					$("#tambah-pelanggan").find($(".modal-title")).html("Data pelanggan yang anda pilih belum lengkap, silahkan lengkapi");
					$("#tambah-pelanggan").find($("form [name='namapelanggan']")).val(id);
					$("#tambah-pelanggan").modal("show");
				}
			},
			complete : function() {
				$(".loading-container").text("");
			}
		})
	})

	$("#tambah-pelanggan").find($("form")).submit(function(e) {
		e.preventDefault();
		
		let modal = $(this).closest($(".modal-dialog")).parent();
		let form = $(this);

		$.ajax({
			url : "<?php echo base_url('admin/init/touch/tambah_pelanggan') ?>",
			data : $(this).serialize(),
			type : "POST",
			beforeSend : function() {
				$(this).find($(".loading-container")).html(loading());
			},
			success : function(data) {
				if(typeof dataPelanggan == "object") dataPelanggan.ajax.reload();

				data = JSON.parse(data);
				if(data.status == "ok") notif("Pelanggan telah di tambahkan");

			},
			complete : function() {
				if($(modal).modal("hide")) {
					let limitAlamat = form.find($(".limit-value")).attr("data-limit");
					form[0].reset();
					form.find($("input[name='namapelanggan']")).focus();
					form.find($(".limit-value p.limit-indicator")).text("0 / "+limitAlamat);
				}
			}
		})
	});

	//////////////////////////////////////////////////////////////////////////////////

	// javascript menu

	// tambah menu
	$("#tambah-menu").find($("form")).submit(function(e) {
		e.preventDefault();

		let parent = $("#tambah-menu");
		let elLoading = parent.find($(".loading-container")); 
		let form = $(this);

		$.ajax({
			url : "<?php echo base_url('admin/insert_handle/touch/tambah_menu') ?>",
			type : "POST",
			data : $(this).serialize(),
			beforeSend : function() {
				elLoading.html(loading());
			},
			success : function(data) {
				data = JSON.parse(data);

				if(data.status == "ok") {
					form.find($(":input")).val();
					
					(parent.modal("hide")) ? notif(data.msg) : false;
					
					if(typeof menuTable == "object") menuTable.ajax.reload();
				}
				else
					alert(data);
			}
		})
	})

	// update menu
	$("#modal-update-menu").find($("form")).submit(function(e) {
		e.preventDefault();

		let parent = $("#modal-update-menu");
		let form = $(this);

		$.ajax({
			url : "<?php echo base_url('admin/update_handle/touch/update_menu') ?>",
			data : $(this).serialize(),
			type : "POST",
			beforeSend : function() {
				parent.find($(".loading-container")).html(loading());
			},
			success : function(data) {
				data = JSON.parse(data);

				if(data.status == "ok") {
					if(parent.modal("hide")) {
						notif(data.msg);
						menuTable.ajax.reload();

						parent.find($(".loading-container")).html("");

						form.find($(":input")).val();
					}
				}	
				else {
					alert(data);
				}
			}
		})
	})

	//////////////////////////////////////////////////////////////////////////////////


	// javascript pesanan
	$(document).on("click", "#buka-tab-tambah-pesanan", function() {
		$("#tambah-pesanan-card").show(300);

		$("#tutup-tab").click(function() {
			$("#tambah-pesanan-card").hide(300);
		})
	})

	let parent = $("#tambah-pesanan-card");
	let form = parent.find($("form"));
	let table = form.find($("table"));
	let index = 1;

	table.find($("#tambah-tab-input")).click(function() {

		if(table.find($("tbody tr")).length == 0) $("#button-form-pesanan").show();

		let el = "";
		el += "<tr id='data"+index+"'>";
		el += '<td><select name="idmenu[]" required="" class="ms"></select></td>';
		el += '<td><input type="number" name="jumlah[]" class="form-control input-sm" required="" placeholder="jumlah..."></td>';
		el += '<td class="text-center"><a href="#" data-position="'+index+'" id="hapus-tab-input" class="text-danger"><i class="fa fa-fw fa-times"></i></a></td>';
		el += "</tr>";

		table.find($("tbody")).append(el);

		menuSelect();


		index++;
	})

	$(document).on("click", "#hapus-tab-input", function() {
		let id = $(this).attr("data-position");

		table.find($("tr#data"+id)).remove();

		if(table.find($("tbody tr")).length == 0) $("#button-form-pesanan").hide();
	})

	// tambah pesanan handle
	form.submit(function(e) {
		e.preventDefault();

		let elLoading = $(".loading-container");

		let serializeData = $(this).serialize();

		$.ajax({
			url : "<?php echo base_url('admin/insert_handle/touch/pesanan') ?>",
			data : serializeData,
			type : "POST",
			beforeSend : function() {
				elLoading.text("Loading...");
			},
			success : function(data) {
				data = JSON.parse(data);
				if(data.status == "ok") notif(data.msg);
				else alert(data.msg);
			},
			complete : function() {
				elLoading.text("");
				if(typeof tablePesanan == "object") tablePesanan.ajax.reload();

				$("#tambah-pesanan-card").hide(200);
			}
		})
	})

	// transaksi

	$("#tambah-transaksi").find("form select[name='idpesanan']").select2({
		width : "100%",
		placeholder : "Cari nama / ID pemesan...",
		ajax : {
			url : "<?php echo base_url('admin/load_handle/touch/pesanan') ?>",
			dataType : "JSON",
			type : "POST",
			cache : true,
			data : function(params) {
				return {
					search : params.term,
					page : params.page || 1,
					tipe : "select2"
				}
			},
			processResults : function(data, params) {
				params.page = params.page || 1;

				return {
					results : data.items,
					pagination : (params.page * 10) < data.count_filtered
				}
			}
		}
	}).on("select2:select", function(e) {
		var id = e.params.data.id;
		var parent = $("#tambah-transaksi");
		var elKonfirmasi = $("#konfirmasi-transaksi");
		var form = $("form");

		parent.find(form).submit(function(e) {
			e.preventDefault();

			$.ajax({
				url : "<?php echo base_url('admin/load_handle/touch/part_pesanan') ?>",
				type : "POST", 
				data : {idpesanan : id},
				beforeSend : function() {
					parent.find($(".loading-container")).html(loading());
				},
				success : function(data) {

					dataSet = JSON.parse(data);

					parent.modal("hide")

					$.each(dataSet, function(i,v) {
						
						// masukkan data pesanan kedalam form transakasi
						elKonfirmasi.find($("form input[name='pesanan_idpesanan']")).val(v.idpesanan);
						elKonfirmasi.find($("form input[name='total']")).val(v.total);

						let elList = "";
						elList += "<li class='list-group-item'><b>Pembeli : </b>"+v.namapelanggan+"</li>";
						elList += "<li class='list-group-item'><b>Menu Pesanan : </b>"+v.namamenu+"</li>";
						elList += "<li class='list-group-item'><b>Harga satuan : </b>"+accounting.formatMoney(v.satuan, "Rp ", ".")+"</li>";
						elList += "<li class='list-group-item'><b>Jumlah Beli : </b>"+v.jumlah+"</li>";
						elList += "<li class='list-group-item'><b>Nohp : </b>"+v.nohp+"</li>";
						elList += "<li class='list-group-item'><b>Alamat : </b>"+v.alamat+"</li>";

						elKonfirmasi.find($("form ul.list-group")).html(elList);

						// append total and kembalian
						elKonfirmasi.find($("form .total-bayar")).html(accounting.formatMoney(v.total, "Rp ", "."));
						elKonfirmasi.find($("form .total-bayar")).attr("data-harga", v.total);
					})

					elKonfirmasi.modal("show");

					// saat user memasukkan harga
					let dataHarga, curBayar, total;
					elKonfirmasi.find($("form input[name='input-total-bayar']")).keyup(function() {

						dataHarga = $(".total-bayar").attr("data-harga");
						curBayar = this.value.replace(/[^0-9]/g, "");

						total = Number(curBayar - dataHarga);

						if(total < 0){
							$(".kembalian").text(accounting.formatMoney(0, "Rp ", "."));
							elKonfirmasi.find($("form button[type='submit']")).attr("disabled", true);
							elKonfirmasi.find($(".modal-header .modal-title")).text("* Jumlah nominal yang di masukkan tidak cukup");
						}
						else{
							$(".kembalian").text(accounting.formatMoney(total, "Rp ", "."));
							elKonfirmasi.find($("form button[type='submit']")).attr("disabled", false);
							elKonfirmasi.find($(".modal-header .modal-title")).text("");

							// masukkan jumlah bayar ke dalam inputan
							elKonfirmasi.find($("form input[name='bayar']")).val(curBayar);
						}
					})
					
					// saat transaksi dibayarkan
					elKonfirmasi.find($("form")).submit(function(e) {
						e.preventDefault();

						$.ajax({
							url : "<?php echo base_url('admin/insert_handle/touch/transaksi') ?>",
							data : $(this).serialize(),
							type : "POST",
							beforeSend : function() {
								elKonfirmasi.find($(".loading-container")).html(loading());
							},
							success : function(data) {
								if(typeof tableTransaksi == "object") tableTransaksi.ajax.reload();
							},
							complete : function() {
								elKonfirmasi.find($(".loading-container")).html("");
								elKonfirmasi.modal("hide");
								
								let totalFix = elKonfirmasi.find($(".total-bayar")).attr("data-harga");
								let bayarFix = curBayar;
								let kembalianFix = total;

								$("#transaksi-sukses")
								.find($("ul.list-group li .output"))
								.eq(0).text(accounting.formatMoney(totalFix, "Rp ", "."));
								
								$("#transaksi-sukses")
								.find($("ul.list-group li .output"))
								.eq(1).text(accounting.formatMoney(bayarFix, "Rp ", "."));
								
								$("#transaksi-sukses")
								.find($("ul.list-group li .output"))
								.eq(2).text(accounting.formatMoney(kembalianFix, "Rp ", "."));

								$("#transaksi-sukses").modal({
									backdrop : "static",
									keyboard : false
								})
							}
						})
					})
				},
				complete : function() {
					parent.find($(".loading-container")).html("");
				}
			})
		})
	})

	//////////////////////////////////////////////////////////////////////////
</script>