<script type="text/javascript">
	// load all menu
	var menuTable = $(".table-menu").DataTable({
		processing : true,
		serverSide : true,
		ajax : {
			url : "<?php echo base_url('admin/load_handle/touch/load_menu') ?>",
		}
	})

	// action on table menu
	menuTable.on("click", "a", function() {
		let action = $(this).attr("id");
		let id = $(this).attr("data-id")

		let hapusData = () => {
			let confirm = window.confirm("Hapus data menu ini ?");
			if(confirm) {
				$.ajax({
					url : "<?php echo base_url('admin/delete_handle/touch/hapus_menu') ?>",
					type : "POST",
					data : {idmenu : id},
					beforeSend : function() {
						notif("Sedang menghapus silahkan tunggu...")
					},
					success : function(data) {
						menuTable.ajax.reload();
						data = JSON.parse(data);
						(data.status == "ok") ? notif(data.msg) : "Gagal menhapus data";
					}
				})
			}
		}

		let editData = () => {
			$.ajax({
				url : "<?php echo base_url('admin/load_handle/touch/load_part_menu') ?>",
				type : "POST", 
				data : {idmenu : id},
				beforeSend : function() {
					notif("Mohon tunggu sebentar...");
				},
				success : function(data) {
					data = JSON.parse(data);

					let inputan = $("#modal-update-menu").find($("form"));
					let namamenu = data[0].namamenu;
					let idmenu = data[0].idmenu;
					let harga = accounting.formatMoney(data[0].harga, "Rp ", ".");
					
					inputan.find($("input[name='namamenu']")).val(namamenu);
					inputan.find($("input[name='harga']")).val(harga);
					inputan.find($("input[name='idmenu']")).val(idmenu);


					$("#modal-update-menu").modal("show");

					inputan.find($("input[name='harga']")).keyup(function() {
						this.value = accounting.formatMoney(this.value, "Rp ", ".");
					})
				}
			})
		}

		switch(action) {
			case "hapusData" :
				hapusData();
				break;
			case "editData" :
				editData();
				break;
		}
	})

	// // tambah menu
	// $("#tambah-menu").find($("form")).submit(function(e) {
	// 	e.preventDefault();

	// 	let parent = $("#tambah-menu");
	// 	let elLoading = parent.find($(".loading-container")); 
	// 	let form = $(this);

	// 	$.ajax({
	// 		url : "<?php echo base_url('admin/insert_handle/touch/tambah_menu') ?>",
	// 		type : "POST",
	// 		data : $(this).serialize(),
	// 		beforeSend : function() {
	// 			elLoading.html(loading());
	// 		},
	// 		success : function(data) {
	// 			data = JSON.parse(data);

	// 			if(data.status == "ok") {
	// 				form.find($(":input")).val();
					
	// 				(parent.modal("hide")) ? notif(data.msg) : false;
					
	// 				menuTable.ajax.reload();
	// 			}
	// 			else
	// 				alert(data);
	// 		}
	// 	})
	// })

	// // update menu
	// $("#modal-update-menu").find($("form")).submit(function(e) {
	// 	e.preventDefault();

	// 	let parent = $("#modal-update-menu");
	// 	let form = $(this);

	// 	$.ajax({
	// 		url : "<?php echo base_url('admin/update_handle/touch/update_menu') ?>",
	// 		data : $(this).serialize(),
	// 		type : "POST",
	// 		beforeSend : function() {
	// 			parent.find($(".loading-container")).html(loading());
	// 		},
	// 		success : function(data) {
	// 			data = JSON.parse(data);

	// 			if(data.status == "ok") {
	// 				if(parent.modal("hide")) {
	// 					notif(data.msg);
	// 					menuTable.ajax.reload();

	// 					parent.find($(".loading-container")).html("");

	// 					form.find($(":input")).val();
	// 				}
	// 			}	
	// 			else {
	// 				alert(data);
	// 			}
	// 		}
	// 	})
	// })
</script>