$( document ).ready(function() {

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;


manageData(); //manageData fonksiyonunu başlatır

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',	//veri türünü belirliyoruz
        url: url+'api/veriAl.php',	//sayfanın urlsini belirliyoruz
        data: {page:page}	//bulunduğumuz sayfadaki verileri data değişkenine alıyoruz
    }).done(function(data){ //.success fonksiyonu ajax ın verileri çektiği fonksiyondur
    	total_page = Math.ceil(data.total/5);	
		//eğer veriler geldiyse toplam sayfa sayısını 5 e bölerek alıyoruz
    	current_page = page; // bulunduğumuz sayfanın gözükmesini sağlıyoruz

    	$('#pagination').twbsPagination({ //sayfalandırma fonksiyonudur
	        totalPages: total_page, 
	        visiblePages: 10, //maksimum kaç sayfa görüntülenmesini sağlıyoruz
	        onPageClick: function (event, pageL) { //tıklanılan sayfanın görüntülenmesini sağlar
	        	page = pageL; 
                if(is_ajax_fire !== 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;

    });

}

/* Get Page Data*/
function getPageData() { //verileri çektiğimiz php sayfasını çağıran fonksiyon
	$.ajax({
    	dataType: 'json',
    	url: url+'api/veriAl.php',
    	data: {page:page} //verileri dataya alıyoruz
	}).done(function(data){
		manageRow(data.data); //başarılıysa manageRow fonksiyonuna gönderiyoruz
	});
}


/* Add new Item table row */
function manageRow(data) { // eklenen verileri sayfada göstereceğimiz fonksiyondur
	var	rows = '';	//başlangıç olarak boş bir değer
	$.each( data, function( key, value ) { 
		//Jquery nesnesinde döngüsel işlemleri gerçekleştirmek için kullandığımız fonksiyon
	  	rows = rows + '<tr class="w3-hover-light-grey">';
	  	rows = rows + '<td>'+value.ad+'</td>';
		rows = rows + '<td>'+value.soyad+'</td>';
	  	rows = rows + '<td>'+value.tel+'</td>';
		rows = rows + '<td>'+value.email+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="w3-btn w3-green btn-primary edit-item">Düzenle</button> ';
        rows = rows + '<button class="w3-btn btn-danger remove-item">Sil</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
		//buraya kadar olan kısım ise veritabanından aldığımız değeri html sayfası olarak gözükmesini sağlıyor
	});

	$("tbody").html(rows); //tbody tagının içine rows değişkenini aktarıyoruz
}

/* Create new Item */
$(".crud-submit").click(function(e){ //yeni eleman eklediğimiz fonksiyondur
    e.preventDefault(); //nesnenin bazı özelliklerini kaldırmak için kullanırız.
    var form_action = $("#create-item").find("form").attr("action");
    var ad = $("#create-item").find("input[name='ad']").val();
    var soyad = $("#create-item").find("input[name='soyad']").val();
    var tel = $("#create-item").find("textarea[name='tel']").val();
    var email = $("#create-item").find("input[name='email']").val();
	//formdaki verileri değişkene alıyoruz
    if(ad != '' && tel != ''&& soyad!=''&& email!='' ){ //eğer formun içi boş değilse
        $.ajax({
            dataType: 'json',
            type:'POST', //post metodu ile göndereceğiz
            url: url + form_action,
            data:{ad:ad, tel:tel,soyad:soyad,email:email } //datanın verilerine değişkenleri atıyoruz
        }).done(function(data){
            $("#create-item").find("input[name='ad']").val('');
            $("#create-item").find("textarea[name='tel']").val('');
			$("#create-item").find("input[name='soyad']").val('');
            $("#create-item").find("input[name='email']").val('');
			//işlem başarılı olduysa formun içeriğini boşaltıyoruz
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Ürün Eklendi.', 'İşlem Başarılı', {timeOut: 5000});
        });
    }else{
		toastr.error('Ürün Oluşturulamadı.','İşlem Başarısız!',{timeOut:5000});
		
    }

});

/* Remove Item */
$("body").on("click",".remove-item",function(){ //silme yaptığımız php dosyasını çağıran fonksiyon
    var id = $(this).parent("td").data('id'); //silmek için ilk önce sil butonunun bulunduğu sütuna gidiyoruz
    var c_obj = $(this).parents("tr"); //sonra da parent fonksiyonundan bulunduğu satıra gidip satırın id sini alıyoruz

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + 'api/sil.php', //sil.php sayfasına gönderip veritabanından silme işlemini gerçekleştiriyoruz
        data:{id:id}
    }).done(function(data){
        c_obj.remove(); //nesneyi sayfadan siliyoruz
        toastr.warning('Silme İşlemi Başarılı.', 'İşlem Başarılı', {timeOut: 5000});
        getPageData();
    });

});


/* Edit Item */
$("body").on("click",".edit-item",function(){ //verileri güncellemek için formdan verileri aldığımız fonksiyon

    var id = $(this).parent("td").data('id');
    var ad = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
    var soyad = $(this).parent("td").prev("td").prev("td").prev("td").text();
    var tel = $(this).parent("td").prev("td").prev("td").text();
    var email = $(this).parent("td").prev("td").text();
	//aşağıdan başlayarak hiyerarşiye göre sürekli bir önceki elemanı değişkenlere alıyoruz

    $("#edit-item").find("input[name='ad']").val(ad);
    $("#edit-item").find("input[name='soyad']").val(soyad);
    $("#edit-item").find("textarea[name='tel']").val(tel);
    $("#edit-item").find("input[name='email']").val(email);	
    $("#edit-item").find(".edit-id").val(id); 
	//değişkenlerin formun içerisinde gözükmesini sağlıyoruz

});


/* Updated new Item */
$(".crud-submit-edit").click(function(e){ // değiştirilen değerlerin sayfada ve veritabanında değişmesini sağlayan fonksiyon

    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var ad = $("#edit-item").find("input[name='ad']").val();
	var soyad = $("#edit-item").find("input[name='soyad']").val();
    var tel = $("#edit-item").find("textarea[name='tel']").val();
	var email = $("#edit-item").find("input[name='email']").val();
    var id = $("#edit-item").find(".edit-id").val();
	//değerleri değişkenlere alıyoruz

    if(ad != '' && tel != ''&& soyad!= '' && email!=''){ //eğer değerler boş değilse 
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{ad:ad,soyad:soyad, tel:tel, email:email,id:id} // verileri veritabanına göndermek için data nesnesine yüklüyoruz
        }).done(function(data){ //yükleme başarılı ise
            getPageData();//verileri gösteren fonksiyon
            $(".modal").modal('hide');
            toastr.success('Ürün Güncellendi.', 'İşlem Başarılı', {timeOut: 5000});
        }).fail(function(e) {
            console.log( e );
			toastr.error('Ürün Güncellenemedi.','İşlem Başarısız!',{timeOut:5000});
          });
    }else{
        alert('Bir Hata Oluştu.');
    }

});
});