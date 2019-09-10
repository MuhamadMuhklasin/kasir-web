

<script type="text/javascript">


	$("select[name='namapelanggan']").select2({
		width : "100%",
		placeholder : "Cari pelanggan Nama / ID",
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
</script>