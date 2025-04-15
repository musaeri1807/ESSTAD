      <!-- Content Header (Page header) -->
      <?php $header1 = "dddd";
		$header2 = 'ddd'; ?>
      <section class="content-header">
      	<div class="container-fluid">
      		<div class="row mb-2">
      			<div class="col-sm-6">
      				<h1>:: <?= $header1; ?></h1>
      			</div>
      			<div class="col-sm-6">
      				<ol class="breadcrumb float-sm-right">
      					<li class="breadcrumb-item"><a href="<?= base_url('homepage') ?>">Home</a></li>
      					<li class="breadcrumb-item active"><?= $header1; ?></li>
      					<li class="breadcrumb-item active"><?= $header2; ?></li>
      				</ol>
      			</div>
      		</div>
      	</div><!-- /.container-fluid -->
      </section>