<?php echo $header; ?>
<div class="container">
	<div class="row">
		<div class="col-md-9 contact">
			<h1>Контактирајте не</h1>
			<form>
				<div class="form-group">
					<label>Име и Презиме</label>
					<input type="text" class="form-control" placeholder="Внесете го вашето име и презиме" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label>E-Mail</label>
					<input type="text" class="form-control" placeholder="Внесете ја вашата E-mail адреса" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label>Наслов</label>
					<input type="text" class="form-control" placeholder="Наслов на вашата порака" aria-describedby="basic-addon1">
				</div>
				<div class="form-group">
					<label>Порака</label>
					<textarea class="form-control" placeholder="Текстот на вашата порака..." ></textarea>
					<button type="submit" class="btn btn-default">
						Испрати
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>