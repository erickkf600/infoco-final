<div class="modal fade" id="mudar<?php echo$id ?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					Novo Nome
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="update-img.php" method="post" enctype="multipart/form-data">
					<div class="modal-body">
					<div class='input-wrapper'>
						<input type="file" name="arquivos" id="foto" accept="image/jpeg, image/png, image/jpg" />
						<input type="hidden" name="id" value="<?php echo$id ?>">
						<small class="form-text text-muted">
							Adione a nova Imagem com resolução maxima de L = 439px A = 364px
						</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info">OK</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>