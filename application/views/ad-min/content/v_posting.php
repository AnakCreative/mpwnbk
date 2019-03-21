<!-- bootstrap tags input -->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/plugins/jquery.tagsinput/src/jquery.tagsinput.min.css">
<!-- end -->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/build/css/custom.css">
<!-- END STYLE & JAVASCRIPT -->
<div class="page-content container-fluid">
    <div id="add-general-post" class="widget">
        <div class="widget-body">
            <form method="POST" id="c_posting_form" class="form-horizontal" enctype="multipart/form-data">
              <!-- field by id -->
              <input type="hidden" value="" name="id" />
              <div class="form-body">
                  <div class="form-group">
                      <label class="control-label col-md-3">judul</label>
                      <div class="col-md-9">
                          <input class="form-control" placeholder="title" name="title" value="" />
                          <span id="title" class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">pilih kategori konten</label>
                      <div class="col-md-9">
                          <select class="js-example-basic-single js-states form-control" id="type-select" style="width:100%;" name="type">
                            <option value="">-- pilih kategori konten --</option>
                            <option value="article">artikel</option>
                            <option value="event">acara</option>
                            <!-- <option value="poma">persatuan orang tua mahasiswa</option>
                            <option value="ksrpd">korean society for rehabilitation of person with disabilities</option> -->
                            <option value="info">news</option>
                          </select>
                          <span id="type" class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">konten</label>
                      <div class="col-md-9">
                          <textarea name="text" id="content-posting"></textarea>
                          <span id="text" class="help-block"></span>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label class="control-label col-md-3">meta-tag-title</label>
                      <div class="col-md-9">
                          <input class="form-control" placeholder="meta tag title" name="meta_tag_title" value="" />
                          <span id="meta_tag_title" class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">meta-tag-keywords</label>
                      <div class="col-md-9">
                          <input name="meta_tag_keywords" type="text" value="" data-type="tags" class="form-control tags tags-input">
                          <span id="meta_tag_keywords" class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">meta-tag-description</label>
                      <div class="col-md-9">
                          <textarea class="form-control" placeholder="meta tag description" name="meta_tag_description"></textarea>
                          <span id="meta_tag_description" class="help-block"></span>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar : max 3mb</label>
                      <div class="col-sm-9">
                          <input name="file_image" type="file">
                          <span id="file_image" class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label id="img-label" for="img-src" class="col-sm-3 control-label">gambar</label>
                      <div class="col-sm-9">
                          <img id="img-src" width="200px" height="200px" class="img-thumbnail img-responsive" />
                      </div>
                  </div>
              </div>
              <!-- end field form -->
              <button type="button" onclick="close_add_form()" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
              <button type="submit" onclick="bttn_save_c_posting()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
            </form>
        </div>
    </div>
	<!-- content datatables for this page -->
	<div class="widget">
		<div class="widget-heading">
			<h3 class="widget-title">Content Article</h3>
		</div>
		<div class="widget-body">
			<div class="col-sm-3">
				<button id="bttn_reload" onclick="reload_table()" class="btn btn-outline btn-success"><i class="ti-reload"></i> muat ulang isi tabel</button>
			</div>
			<br><br>
			<table id="table-article" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
				<thead>
				<tr>
					<th>#</th>
					<th>judul</th>
					<th>meta tag judul</th>
					<th>meta tag kata kunci</th>
					<th>meta tag deskripsi</th>
<!--					<th>username</th>-->
					<th>tanggal buat</th>
					<th>tipe</th>
					<th>aksi</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- end content datatables for this page -->
</div>
<!-- END CONTAINER -->
<script>
	var postingEditor;
	ClassicEditor
		.create(document.querySelector('#content-posting'), {
			alignment: {
				options: ['left', 'right', 'center', 'justify']
			},
			ckfinder: {
				uploadUrl: '<?=base_url('assets/back-end/plugins/ckeditor5-build-classic/build/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json');?>'
			},
			toolbar: [
				'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo', 'imageUpload', 'imageStyle:full',
				'imageStyle:side',
				'|',
				'imageTextAlternative'
			]
		})
		.then(editor => {
			console.log('Editor was initialized', editor);
			postingEditor = editor;
		})
		.catch(err => {
			console.error(err.stack);
		});
</script>
<!-- article -->
<!-- end modal -->
