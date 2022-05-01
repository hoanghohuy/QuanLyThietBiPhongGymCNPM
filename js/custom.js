$(document).ready(function(){

	// tạo sự kiện click nút Sửa nhà cung cấp
	$("body").on("click", ".btn-show", function(){
		$this = $(this);
		$modal = $("#SuaNCC");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhacungcap_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=ncc_id]").val(resp.data.ncc_id);
				$modal.find("input[name=ncc_name]").val(resp.data.ncc_name);
				$modal.find("input[name=ncc_address]").val(resp.data.ncc_address);
				$modal.find("input[name=ncc_matchday]").val(resp.data.ncc_matchday);
				$modal.find("input[name=ncc_note]").val(resp.data.ncc_note);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// tạo sự kiện click nút Xóa nhà cung cấp
	$("body").on("click", ".btn-xoa", function(){
		$this = $(this);
		$modal = $("#XoaNcc");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhacungcap_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=ncc_id]").val(resp.data.ncc_id);
				$modal.find("input[name=ncc_name]").val(resp.data.ncc_name);
				$modal.find("input[name=ncc_address]").val(resp.data.ncc_address);
				$modal.find("input[name=ncc_matchday]").val(resp.data.ncc_matchday);
				$modal.find("input[name=ncc_note]").val(resp.data.ncc_note);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});


	// tạo sự kiện click nút Sửa NHÂN VIÊN
	$("body").on("click", ".btn-suanv", function(){
		$this = $(this);
		$modal = $("#SuaNV_Modal");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhanvien_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=u_id]").val(resp.data.id);
				$modal.find("input[name=u_fn]").val(resp.data.first_name);
				$modal.find("input[name=u_ln]").val(resp.data.last_name);
				$modal.find("input[name=u_dob]").val(resp.data.dob);
				$modal.find("input[name=u_user]").val(resp.data.username);
				$modal.find("input[name=u_pwd]").val(resp.data.pwd);
				$modal.find("input[name=u_role]").val(resp.data.role);
				$modal.find("input[name=u_isActive]").val(resp.data.isActive);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// tạo sự kiện click nút XÓA NHÂN VIÊN
	$("body").on("click", ".btn-xoanv", function(){
		$this = $(this);
		$modal = $("#DeteteNV_Modal");
		// lấy id
		var id = $this.data("id");
		alert("xoa id" + id)
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhanvien_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=u_id]").val(resp.data.id);
				$modal.find("input[name=u_fn]").val(resp.data.first_name);
				$modal.find("input[name=u_ln]").val(resp.data.last_name);
				$modal.find("input[name=u_dob]").val(resp.data.dob);
				$modal.find("input[name=u_user]").val(resp.data.username);
				$modal.find("input[name=u_pwd]").val(resp.data.pwd);
				$modal.find("input[name=u_role]").val(resp.data.role);
				$modal.find("input[name=u_isActive]").val(resp.data.isActive);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// THIẾT BỊ
	// XỬ LÝ SỰ KIỆN XEM THÔNG TIN THIẾT BỊ
	$("body").on("click", ".btn-showtb", function(){
		$this = $(this);
		$modal = $("#DetailEquipment");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({
			url: "./controller/thietbi_xem.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				console.log("data" + resp.data.name)

				$modal.find("input[name=eq_id]").val(resp.data.eq_id);
				$modal.find("input[name=eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=eq_quantity]").val(resp.data.eq_quantity);
				$modal.find("input[name=eq_ngaynhaphang]").val(resp.data.eq_ngaynhaphang);
				$modal.find("input[name=eq_ngayhethanbaohanh]").val(resp.data.eq_ngayhethanbaohanh);
				$modal.find("input[name=eq_dongia]").val(resp.data.eq_dongia);
				$modal.find("input[name=eq_status]").val(resp.data.eq_status);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// XỬ LÝ SỰ KIỆN SỬA THIẾT BỊ
	$("body").on("click", ".btn-edittb", function(){
		$this = $(this);
		$modal = $("#EditEquipment");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({
			url: "./controller/thietbi_sua_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				console.log("data" + resp.data.name)

				$modal.find("input[name=eq_id]").val(resp.data.eq_id);
				$modal.find("input[name=eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=eq_quantity]").val(resp.data.eq_quantity);
				$modal.find("input[name=eq_ngaynhaphang]").val(resp.data.eq_ngaynhaphang);
				$modal.find("input[name=eq_ngayhethanbaohanh]").val(resp.data.eq_ngayhethanbaohanh);
				$modal.find("input[name=eq_dongia]").val(resp.data.eq_dongia);
				$modal.find("input[name=eq_status]").val(resp.data.eq_status);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});


	 // XỬ LÝ SỰ KIỆN XÓA THIẾT BỊ
	$("body").on("click", ".btn-xoatb", function(){
		debugger;
		$this = $(this);
		$modal = $("#DeleteEquipment");
		// lấy id
		var id = $(this).attr("data-id");
		var id = $this.data("id");
		$modal.find("input[name=eq_id]").val(id);
	});

	// HÓA ĐƠN
	// XỬ LÝ SỰ KIỆN SỬA HÓA ĐƠN
	$("body").on("click", ".btn-showhd", function(){
		$this = $(this);
		$modal = $("#DetailHoaDon");
		// lấy id
		var id = $this.data("id");
		console.log("id hoa don: ", id);
		// ajax lay data tu id
		$.ajax({
			url: "./controller/hoadon_sua_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				
				// fill data lay tu api
				$modal.find("input[name=hoadon_id]").val(resp.data.hoadon_id);
				$modal.find("input[name=eq_id]").val(resp.data.last_name);
				$modal.find("input[name=eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=ncc_id]").val(resp.data.ncc_name);
				$modal.find("input[name=ngaylaphoadon]").val(resp.data.ngaylaphoadon);
				$modal.find("input[name=hoadon_soluong]").val(resp.data.soluong);
				$modal.find("input[name=total]").val(resp.data.total);
				$modal.find("input[name=hoadon_type]").val(resp.data.hoadon_type);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			alert("Lay that bai")
		});
		
	});

})