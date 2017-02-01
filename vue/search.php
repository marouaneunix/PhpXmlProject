<?php
session_start();
if($_SESSION['logged-in'] == false || $_SESSION['type'] != 'admin')
	header('Location: 404.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
  		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/jquery.js"></script>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-tagsinput.css">
		<script src="../bootstrap/js/bootstrap-tagsinput.min.js"></script>
	
		
		<style>

			#custom-search-input {
				margin:0;
				margin-top: 10px;
				padding: 0;
			}
		
			#custom-search-input .search-query {
				padding-right: 3px;
				padding-right: 4px \9;
				padding-left: 3px;
				padding-left: 4px \9;
				/* IE7-8 doesn't have border-radius, so don't indent the padding */
		 
				margin-bottom: 0;
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
			}
		 
			#custom-search-input button {
				border: 0;
				background: none;
				/** belows styles are working good */
				padding: 2px 5px;
				margin-top: 2px;
				position: relative;
				left: -28px;
				/* IE7-8 doesn't have border-radius, so don't indent the padding */
				margin-bottom: 0;
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
				color:#D9230F;
			}
		 
			.search-query:focus + button {
				z-index: 3;   
			}
			
			.bootstrap-tagsinput {
				width: 100%;
			}
			.label {
				line-height: 2 !important;
			}
			
			.bootstrap-tagsinput {
				border: 2px solid #2D2C2C;
				border-radius: 0px;
			}
			
			#btn-srch{
				border-radius: 0px;
			}
			
			#input-srch{
				padding-right: 0px !important;
			}
			
</style>
		</style>
	</head>
	<body>
		<?php include("navbar.php") ?>
		
		

		<div class="x_content" style="margin-top: 80px;">
			<div class="container" style="margin-bottom:50px;">
				<div class="row">
					<form id="bootstrapTagsInputForm" method="get" action="search.php" role="search" class="form-horizontal">
						<div class="form-group">
							<div id="input-srch" class="col-xs-11">
								<input type="text" id="search" name="search" class="search-query form-control" value="" data-role="tagsinput" />
							</div>
							<button id="btn-srch" class="btn btn-danger" type="submit">
									<span class=" glyphicon glyphicon-search"></span>
							</button>
						</div>	
					</form>
				</div>
			</div>
			<table class="table table-striped responsive-utilities jambo_table bulk_action">
				<thead>
					<tr class="headings">
						<th class="column-title">Nom </th>
						<th class="column-title">Prenom </th>
						<th class="column-title">Domaine </th>
						<th class="column-title">Key word </th>
						<th class="column-title">Rapport </th>
						<th class="column-title">Projet </th>
					</tr>
				</thead>
				<?php
					if(!isset($_GET['search']))
						$_GET['search'] = "";
					
					$xml = simplexml_load_file('../xmldb/base.xml');
					$search_words = explode(',',$_GET['search']);

					foreach($xml->Etudiant as $student){
						foreach($student->sujet->key_Words->key_Word as $k_w){
							foreach($search_words as $word){
								if($word == $k_w){
									
				?>			
				<tbody>
					<tr class="even pointer">
						<td class=" "><?php echo $student->nom ?></td>
						<td class=" "><?php echo $student->prenom ?></td>
						<td class=" "><?php echo $student->sujet->domaine ?> </td>
						<td class=" "><?php echo $k_w ?></td>
						<td class=" ">
								<a href="<?php echo $student->sujet->rapport ?>">
									<button class="btn btn-success" type="submit">
									<i class="glyphicon glyphicon-save"></i>
									</button>
								</a>
						</td>
						<td class=" ">
								<a href="<?php echo $student->sujet->projet ?>">
									<button class="btn btn-warning" type="submit">
									<i class="glyphicon glyphicon-save"></i>
									</button>
								</a>
						</td>
						
					</tr>
				</tbody>
				<?php
				}
							}
						}
						
					}
				?>
			</table>
		</div>
		
		<script>
			$(document).ready(function () {
				$('#bootstrapTagsInputForm')
					.find('[name="cities"]')
						// Revalidate the cities field when it is changed
						.change(function (e) {
							$('#bootstrapTagsInputForm').formValidation('revalidateField', 'cities');
						})
						.end()
					.find('[name="countries"]')
						// Revalidate the countries field when it is changed
						.change(function (e) {
							$('#bootstrapTagsInputForm').formValidation('revalidateField', 'countries');
						})
						.end()
					.formValidation({
						framework: 'bootstrap',
						excluded: ':disabled',
						icon: {
							valid: 'glyphicon glyphicon-ok',
							invalid: 'glyphicon glyphicon-remove',
							validating: 'glyphicon glyphicon-refresh'
						},
						fields: {
							cities: {
								validators: {
									notEmpty: {
										message: 'Please enter at least one city you like the most.'
									}
								}
							},
							countries: {
								validators: {
									callback: {
										message: 'Please enter 2-4 countries you like most.',
										callback: function (value, validator, $field) {
											// Get the entered elements
											var options = validator.getFieldElements('countries').tagsinput('items');
											return (options !== null && options.length >= 2 && options.length <= 4);
										}
									}
								}
							}
						}
					});
			});
		</script>
	</body>
</html>