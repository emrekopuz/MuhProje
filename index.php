<!DOCTYPE html>
<html>
<head>
	<title>Mühendislisssk Projesi Php - Jquery - Ajax</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css" src="/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<script type="text/javascript">
		var url = "http://localhost/Proje/"; //anasayfanın urlsini belirliyoruz
	</script>
	<style type="text/css">
	.modal-dialog, .modal-content{
		z-index:1051;
	}
</style>

<script src="js/item-ajax.js"></script> 	<!--item-ajax.js script dosyasını çağırıyoruz--> 
</head>
<body>

	<div class="w3-container w3-content">
		<div class="row">
			<div class="col-lg-12 margin-tb">					
				<div class="pull-left">
					<h2>Mühendislik Projesi Php - Jquery - Ajax</h2>
				</div>
				
			</div>
		</div>

		<div class="w3-panel panel-primary">
			<div class="w3-panel  w3-bottombar w3-hover-light-grey w3-padding w3-border-red w3-center">
				<div class="w3-right-align">
					<button type="button" class="w3-btn btn-success w3-round-xxlarge" data-toggle="modal" data-target="#create-item">
						Yeni Kayıt
					</button>
				</div>
				<h2>Kayıt Yönetimi</h2>
			</div>
			
			<div class="w3-panel panel-body">
				<table class="w3-table table-bordered w3-card">
					<thead>
						<tr class="w3-hover-amber ">
							<th>Ad</th>
							<th>Soyad</th>
							<th>Tel</th>
							<th>Email</th>
							<th width="200px">İşlemler</th>
							
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>

				<ul id="pagination" class="pagination-sm"></ul>
			</div>
		</div>

		<!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Create Item</h4>
					</div>

					<div class="modal-body">
						<form data-toggle="validator" action="api/olustur.php" method="POST">

							<div class="form-group">
								<label class="control-label" for="ad">Ad:</label>
								<input type="text" name="ad" class="form-control" data-error="Lütfen İsim Giriniz" required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="soyad">Soyad:</label>
								<input type="text" name="soyad" class="form-control" data-error="Lütfen Soyad Giriniz" required />
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group">
								<label class="control-label" for="tel">Tel:</label>
								<textarea name="tel" class="form-control" data-error="Telefon Numarası Giriniz" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="email">Email:</label>
								<input type="text" name="email" class="form-control" data-error="Lütfen Email Giriniz" required />
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn crud-submit btn-success w3-button">Kaydet</button>
							</div>

						</form>

					</div>
				</div>

			</div>
		</div>

		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Düzenle</h4>
					</div>

					<div class="modal-body">
						<form data-toggle="validator" action="api/guncelle.php" method="put">
							<input type="hidden" name="id" class="edit-id">

							<div class="form-group">
								<label class="control-label" for="title">Ad:</label>
								<input type="text" name="ad" class="form-control" data-error="Ad Giriniz." required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="title">Soyad:</label>
								<input type="text" name="soyad" class="form-control" data-error="Soyad Giriniz." required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="title">Tel:</label>
								<textarea name="tel" class="form-control" data-error="Telefon Numaranızı Giriniz." required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="title">Email:</label>
								<input type="text" name="email" class="form-control" data-error="Email Giriniz." required />
								<div class="help-block with-errors"></div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-success crud-submit-edit">Düzenle</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>