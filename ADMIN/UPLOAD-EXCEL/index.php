<h2>Import Excel File into MySQL Database using PHP</h2>

	<div class="outer-container">
		<div class="row">
			<form accept-charset="utf-8" class="form-horizontal" action="upload.php" method="post"
				name="frmExcelImport" id="frmExcelImport"
				enctype="multipart/form-data" >
				<div Class="input-row">
					<label>Choose your file. <a href="Template/import-template.xlsx"
						download>Download excel template</a></label>
					<div>
						<input type="file" name="file" id="file" class="file"
							accept=".xls,.xlsx">
					</div>
					<div class="import">
						<button type="submit" id="submit" name="import" class="btn-submit">Import
							Excel and Save Data</button>
					</div>
				</div>
			</form>
		</div>
	</div>