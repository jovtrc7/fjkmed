<!-- AREA TOPO/LOGOUT -->
<div class="container-fluid">
	<div class="topo py-4">
		<div class="row align-items-center">
			<div class="col-12 col-sm-6">
				<h1 class="mb-0">FJKMED</h1>
			</div>

			<div class="col-12 col-sm-6 d-none d-sm-block text-right">
				<div class="dropdown">
					<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['FJK_nome']; ?></button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="../controller/logout.php">Fazer logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>