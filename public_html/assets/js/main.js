$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });

	$(document).ready(function(){
		var DOMAIN = "http://localhost/projectinv/public_html";
		$("#register_form").on("submit",function(){
			var status = false;
			var name = $("#username");
			var email = $("#email");
			var pass1 = $("#password1");
			var pass2 = $("#password2");
			var type = $("#usertype");
			
			var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
			if(name.val() == "" || name.val().length < 6){
				name.addClass("border-danger");
				$("#u_error").html("<span class='text-danger'>Silahkan Masukan Nama Dan Nama Harus Melebihi 6 Karakter</span>");
				status = false;
			}else{
				name.removeClass("border-danger");
				$("#u_error").html("");
				status = true;
			}
			if(!e_patt.test(email.val())){
				email.addClass("border-danger");
				$("#e_error").html("<span class='text-danger'>Silahkan Masukan Email Yang Valid</span>");
				status = false;
			}else{
				email.removeClass("border-danger");
				$("#e_error").html("");
				status = true;
			}
			if(pass1.val() == "" || pass1.val().length < 9){
				pass1.addClass("border-danger");
				$("#p1_error").html("<span class='text-danger'>Silahkan Masukan Password lebih dari 9 Digit</span>");
				status = false;
			}else{
				pass1.removeClass("border-danger");
				$("#p1_error").html("");
				status = true;
			}
			if(pass2.val() == "" || pass2.val().length < 9){
				pass2.addClass("border-danger");
				$("#p2_error").html("<span class='text-danger'>Silahkan Masukan Password lebih dari 9 Digit</span>");
				status = false;
			}else{
				pass2.removeClass("border-danger");
				$("#p2_error").html("");
				status = true;
			}
			if(type.val() == ""){
				type.addClass("border-danger");
				$("#t_error").html("<span class='text-danger'>Silahkan Pilih Usertype Anda</span>");
				status = false;
			}else{
				type.removeClass("border-danger");
				$("#t_error").html("");
				status = true;
			}
			if ((pass1.val() == pass2.val()) && status == true) {
				$(".overlay").show();
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method : "POST",
					data : $("#register_form").serialize(),
					success : function(data){
						if (data == "EMAIL_ALREADY_EXISTS") {
							$(".overlay").hide();
							alert("Email Anda Sudah Terdaftar");
						}else if(data == "SOME_ERROR"){
							$(".overlay").hide();
							alert("Ada Kesalahan");
						}else{
							$(".overlay").hide();
							window.location.href = encodeURI(DOMAIN+"/index.php?msg=Kamu Berhasil Terdaftar Sekarang Silahkan Login");
						}
					}
				})
			}else{
				pass2.addClass("border-danger");
				$("#p2_error").html("<span class='text-danger'>Password Tidak Sesuai</span>");
				status = true;
			}
		})
	
		//For Login Part
		$("#form_login").on("submit",function(){
			var email = $("#log_email");
			var pass = $("#log_password");
			var status = false;
			if (email.val() == "") {
				email.addClass("border-danger");
				$("#e_error").html("<span class='text-danger'>Silahkan Masukan Email</span>");
				status = false;
			}else{
				email.removeClass("border-danger");
				$("#e_error").html("");
				status = true;
			}
			if (pass.val() == "") {
				pass.addClass("border-danger");
				$("#p_error").html("<span class='text-danger'>Silahkan Masukan Password</span>");
				status = false;
			}else{
				pass.removeClass("border-danger");
				$("#p_error").html("");
				status = true;
			}
			if (status) {
				$(".overlay").show();
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method : "POST",
					data : $("#form_login").serialize(),
					success : function(data){
						if (data == "NOT_REGISTERD") {
							$(".overlay").hide();
							email.addClass("border-danger");
							$("#e_error").html("<span class='text-danger'>Kamu Belum Terdaftar</span>");
						}else if(data == "PASSWORD_NOT_MATCHED"){
							$(".overlay").hide();
							pass.addClass("border-danger");
							$("#p_error").html("<span class='text-danger'>Password Anda Salah</span>");
							status = false;
						}else{
							$(".overlay").hide();
							console.log(data);
							window.location.href = DOMAIN+"/dashboard.php";
						}
					}
				})
			}
		})
	
		//Fetch category
		fetch_category();
		function fetch_category(){
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {getCategory:1},
				success : function(data){
					var root = "<option value='0'>Root</option>";
					var choose = "<option value=''>Pilih Kategori</option>";
					$("#parent_cat").html(root+data);
					$("#select_cat").html(choose+data);
				}
			})
		}
	
		//Fetch Supplier
		fetch_brand();
		function fetch_brand(){
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {getBrand:1},
				success : function(data){
					var choose = "<option value=''>Pilih Supplier</option>";
					$("#select_brand").html(choose+data);
				}
			})
		}
	
		//Add Category
		$("#category_form").on("submit",function(){
			if ($("#category_name").val() == "") {
				$("#category_name").addClass("border-danger");
				$("#cat_error").html("<span class='text-danger'>Silahkan Masukan Nama Kategori</span>");
			}else{
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method : "POST",
					data  : $("#category_form").serialize(),
					success : function(data){
						if (data == "CATEGORY_ADDED") {
								$("#category_name").removeClass("border-danger");
								$("#cat_error").html("<span class='text-success'>Kategori Baru Sukses Ditambah..!</span>");
								$("#category_name").val("");
								fetch_category();
						}else{
							alert(data);
						}
					}
				})
			}
		})
	
	
		//Add Supplier
		$("#brand_form").on("submit",function(){
			if ($("#brand_name").val() == "") {
				$("#brand_name").addClass("border-danger");
				$("#brand_error").html("<span class='text-danger'>Silahkan Masukan Nama Supplier</span>");
			}else{
				$.ajax({
					url : DOMAIN+"/includes/process.php",
					method : "POST",
					data : $("#brand_form").serialize(),
					success : function(data){
						if (data == "BRAND_ADDED") {
							$("#brand_name").removeClass("border-danger");
							$("#brand_error").html("<span class='text-success'>Supplier Baru Sukses Ditambah..!</span>");
							$("#brand_name").val("");
							fetch_brand();
						}else{
							alert(data);
						}
							
					}
				})
			}
		})
	
		//add product
		$("#product_form").on("submit",function(){
			$.ajax({
					url : DOMAIN+"/includes/process.php",
					method : "POST",
					data : $("#product_form").serialize(),
					success : function(data){
						if (data == "NEW_PRODUCT_ADDED") {
							alert("Barang Baru Sukses Ditambah..!");
							$("#product_name").val("");
							$("#select_cat").val("");
							$("#select_brand").val("");
							$("#product_price").val("");
							$("#product_qty").val("");
	
						}else{
							console.log(data);
							alert(data);
						}
							
					}
				})
		})

	//Mange Category
	manageCategory(1);
	function manageCategory(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {manageCategory:1,pageno:pn},
			success : function(data){
				$("#get_category").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageCategory(pn);
	})

	$("body").delegate(".del_cat","click",function(){
		var did = $(this).attr("did");
		if (confirm("Yakin ? Kamu Ingin Menghapus..!")) {
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {deleteCategory:1,id:did},
				success : function(data){
					if (data == "DEPENDENT_CATEGORY") {
						alert("Maaf ! Kategori ini is dependent on other sub categories");
					}else if(data == "CATEGORY_DELETED"){
						alert("Kategori Deleted Successfully..!");
						manageCategory(1);
					}else if(data == "DELETED"){
						alert("Deleted Successfully");
					}else{
						alert(data);
					}
						
				}
			})
		}else{

		}
	})

	/*//Fetch category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				var root = "<option value='0'>Root</option>";
				var choose = "<option value=''>Pilih Kategori</option>";
				$("#parent_cat").html(root+data);
				$("#select_cat").html(choose+data);
			}
		})
	}

	//Fetch Supplier
	fetch_brand();
	function fetch_brand(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getBrand:1},
			success : function(data){
				var choose = "<option value=''>Pilih Supplier</option>";
				$("#select_brand").html(choose+data);
			}
		})
	}*/


	//Update Category
	$("body").delegate(".edit_cat","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateCategory:1,id:eid},
			success : function(data){
				console.log(data);
				$("#cid").val(data["cid"]);
				$("#update_category").val(data["category_name"]);
				$("#parent_cat").val(data["parent_cat"]);
			}
		})
	})

	$("#update_category_form").on("submit",function(){
		if ($("#update_category").val() == "") {
			$("#update_category").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Silahkan Masukan Nama Kategori</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data  : $("#update_category_form").serialize(),
				success : function(data){
					window.location.href = "";
				}
			})
		}
	})


	//--------------------Supplier---------------------------
	manageBrand(1);
	function manageBrand(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {manageBrand:1,pageno:pn},
			success : function(data){
				$("#get_brand").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageBrand(pn);
	})

	$("body").delegate(".del_brand","click",function(){
		var did = $(this).attr("did");
		if (confirm("Yakin ? Kamu Ingin Menghapus..!")) {
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {deleteBrand:1,id:did},
				success : function(data){
					if (data == "DELETED") {
						alert("Supplier Terhapus");
						manageBrand(1);
					}else{
						alert(data);
					}
						
				}
			})
		}
	})

	//Update Supplier
	$("body").delegate(".edit_brand","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateBrand:1,id:eid},
			success : function(data){
				console.log(data);
				$("#bid").val(data["bid"]);
				$("#update_brand").val(data["brand_name"]);
			}
		})
	})

	$("#update_brand_form").on("submit",function(){
		if ($("#update_brand").val() == "") {
			$("#update_brand").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Silahkan Masukan Nama Supplier</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data  : $("#update_brand_form").serialize(),
				success : function(data){
					alert(data);
					window.location.href = "";
				}
			})
		}
	})


	//---------------------Barang----------------------
	manageProduct(1);
	function manageProduct(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {manageProduct:1,pageno:pn},
			success : function(data){
				$("#get_product").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageProduct(pn);
	})

	$("body").delegate(".del_product","click",function(){
		var did = $(this).attr("did");
		if (confirm("Yakin ? Kamu Ingin Menghapus..!")) {
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : {deleteProduct:1,id:did},
				success : function(data){
					if (data == "DELETED") {
						alert("Barang Terhapus");
						manageProduct(1);
					}else{
						alert(data);
					}
						
				}
			})
		}
	})

	//Update product
	$("body").delegate(".edit_product","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {updateProduct:1,id:eid},
			success : function(data){
				console.log(data);
				$("#pid").val(data["pid"]);
				$("#update_product").val(data["product_name"]);
				$("#select_cat").val(data["cid"]);
				$("#select_brand").val(data["bid"]);
				$("#product_price").val(data["product_price"]);
				$("#product_qty").val(data["product_stock"]);

			}
		})
	})

	//Update product
	$("#update_product_form").on("submit",function(){
		$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#update_product_form").serialize(),
				success : function(data){
					if (data == "UPDATED") {
						alert("Barang Updated Successfully..!");
						window.location.href = "";
					}else{
						alert(data);
					}
				}
			})
	})


	//barang keluar
	addNewRow();

	$("#add").click(function(){
		addNewRow();
	})

	function addNewRow(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getNewOrderItem:1},
			success : function(data){
				$("#invoice_item").append(data);
				var n = 0;
				$(".number").each(function(){
					$(this).html(++n);
				})
			}
		})
	}

	$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	})

	$("#invoice_item").delegate(".pid","change",function(){
		var pid = $(this).val();
		var tr = $(this).parent().parent();
		$(".overlay").show();
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {getPriceAndQty:1,id:pid},
			success : function(data){
				tr.find(".tqty").val(data["product_stock"]);
				tr.find(".pro_name").val(data["product_name"]);
				tr.find(".qty").val(1);
				tr.find(".price").val(data["product_price"]);
				tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val() );
				calculate(0,0);
			}
		})
	})

	$("#invoice_item").delegate(".qty","keyup",function(){
		var qty = $(this);
		var tr = $(this).parent().parent();
		if (isNaN(qty.val())) {
			alert("Masukan Jumlah Yang Valid");
			qty.val(1);
		}else{
			if ((qty.val() - 0) > (tr.find(".tqty").val()-0)) {
				alert("Sorry ! This much of quantity is not available");
				aty.val(1);
			}else{
				tr.find(".amt").html(qty.val() * tr.find(".price").val());
				calculate(0,0);
			}
		}

	})

	/*function calculate(dis,paid){
		var sub_total = 0;
		//var gst = 0;
		//var net_total = 0;
		//var discount = dis;
		var paid_amt = paid;
		var due = 0;
		$(".amt").each(function(){
			sub_total = sub_total + ($(this).html() * 1);
		})
		//gst = 0.18 * sub_total;
		//net_total = gst + sub_total;
		//net_total = net_total - discount;
		//due = net_total - paid_amt;
		due = sub_total - paid_amt;
		//$("#gst").val(gst);
		$("#sub_total").val(sub_total);
		//$("#discount").val(discount);
		//$("#net_total").val(net_total);
		//$("#paid")
		$("#due").val(due);

	}

	$("#discount").keyup(function(){
		var discount = $(this).val();
		calculate(discount,0);
	})

	$("#paid").keyup(function(){
		var paid = $(this).val();
		var discount = $("#discount").val();
		calculate(discount,paid);
	})*/

	function calculate(paid){
		var sub_total = 0;
		var paid_amt = paid;
		var due = 0;
		$(".amt").each(function(){
			sub_total = sub_total + ($(this).html() * 1);
		})
		
		due = sub_total - paid_amt;
		
		$("#sub_total").val(sub_total);
		
		$("#due").val(due);

	}


	$("#paid").keyup(function(){
		var paid = $(this).val();
		calculate(paid);
	})


	/*Order Accepting*/

	$("#order_form").click(function(){

		var invoice = $("#get_order_data").serialize();
		if ($("#cust_name").val() === "") {
			alert("Masukan Nama Tujuan");
		}else if($("#paid").val() === ""){
			alert("Masukan Biaya Pembayaran");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#get_order_data").serialize(),
				success : function(data){

					if (data < 0) {
						alert(data);
					}else{
						$("#get_order_data").trigger("reset");

						if (confirm("Mau Print Invoice ?")) {
							window.location.href = DOMAIN+"/includes/invoice_bill.php?invoice_no="+data+"&"+invoice;
						}
					}

				
				}
			});
		}
		
			
		
		

	});
	
	
	})


});