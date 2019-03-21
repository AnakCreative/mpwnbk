<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/back-end/build/css/custom.css">
<!-- END STYLE & JAVASCRIPT -->
<div class="page-content container-fluid">
  <div class="widget">
	<div class="widget-body">
	  <div class="row mb-15">
		<div class="col-md-7">
		  <p class="form-control-static"><i>manajemen konten sistem</i> alumni</p>
		</div>
		<div class="col-md-5">
		  <form action="<?=base_url()?>ad-min/c_angkatan/search" method="get">
		  <div class="input-group">
			<input name="key" placeholder="pencarian..." required="" class="form-control pr-15" type="text">
			<div class="input-group-btn">
			  <button type="submit" class="btn btn-outline btn-default"><i class="ti-search"></i></button>
			</div>
		  </div>
		  </form>
		</div>
	  </div>
	<div class="row">
	<div class="col-lg-12">
	<div class="row">
		<?php if (empty($angkatan_data)){ ?>
		<div class="col-lg-12" id="error_not_found">
			maaf, tidak ada data {elapsed_time}
		</div>
		<?php } ?>
		<?php for ($i = 0; $i < count($angkatan_data); ++$i) { ?>
        <figure <?php if($angkatan_data[$i]->angkatan==date('Y')){?>class="snip0057 blue"<?php } else { ?>class="snip0057 red"<?php } ?>>
          <figcaption>
            <h2><?php if($angkatan_data[$i]->firstname!=""){ ?><?=$angkatan_data[$i]->firstname;?> <?php } else { ?>firstname zero records {elapsed_time}<?php } ?> <span><?php if($angkatan_data[$i]->lastname!=""){ ?><?=$angkatan_data[$i]->lastname;?> <?php } else { ?>lastname zero records {elapsed_time}<?php } ?> </span></h2>
            <p><?php if($angkatan_data[$i]->biography!=""){ ?><?=$angkatan_data[$i]->biography;?> <?php } else { ?>biography zero records {elapsed_time}<?php } ?></p>
            <div class="icons"><a target="_blank" href="<?php if($angkatan_data[$i]->website!=""){ ?><?=$angkatan_data[$i]->website;?><?php } else { ?>#<?php } ?>"><i class="ion-ios-home"></i></a><a href="mailto:<?php if($angkatan_data[$i]->email!=""){ ?><?=$angkatan_data[$i]->email;?><?php } else { ?>#<?php } ?>"><i class="ion-ios-email"></i></a><a href="<?php if($angkatan_data[$i]->phone_number!=""){ ?><?=$angkatan_data[$i]->phone_number;?><?php } else { ?>#<?php } ?>"><i class="ion-ios-telephone"></i></a><a onclick="bttn_editing_angkatan(<?=$angkatan_data[$i]->alumni_id;?>)" href="javascript:void(0);"><i class="ion-ios-gear"></i></a><a onclick="bttn_delete_angkatan(<?=$angkatan_data[$i]->alumni_id;?>)" href="javascript:void(0);"><i class="ion-ios-trash"></i></a></div>
          </figcaption>
          <div class="image"><img width="440" height="440" src="<?=base_url(); ?>image/alumni/<?php if($angkatan_data[$i]->img!=""){ ?><?=$angkatan_data[$i]->img;?><?php } else { ?>image404.png<?php } ?>" alt="<?=$angkatan_data[$i]->firstname;?>"/></div>
          <div class="position"><?php if($angkatan_data[$i]->angkatan==date('Y')){?>Angkatan <?=$angkatan_data[$i]->angkatan;?><?php } else { ?>Angkatan <?=$angkatan_data[$i]->angkatan;?><?php } ?></div>
        </figure>
        <?php } ?>
	</div>
  </div>
  </div>
	  <nav>
		<?php echo $pagination; ?>
	  </nav>
	</div>
  </div>
</div>
<!-- END CONTAINER -->
<!-- modal for adding angkatan -->
<div id="modalform" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog modal-lg">
    <form method="POST" id="c_angkatan_form" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <h4 id="myAnimationModalLabel" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <!-- field by id -->
          <!-- <input type="hidden" value="" name="id" /> -->
          <!-- field form each -->
          <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">nama depan alumni *</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="nama depan alumni" name="firstname[0]" value=""/>
                  <span id="firstname_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">nama belakang alumni *</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="nama belakang alumni" name="lastname[0]" value=""/>
                  <span id="lastname_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">email **</label>
                <div class="col-md-9">
                    <input placeholder="contoh : mnwnbk@gmail.com" name="email[0]" class="form-control"/>
                    <span id="email_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">website</label>
                <div class="col-md-9">
                    <input placeholder="contoh : https://www.instgram.com/nama alumni" name="website[0]" class="form-control"/>
                    <span id="website_0" class="help-block"></span>
                </div>
            </div>
              <div class="form-group">
                  <label class="control-label col-md-3">grup angkatan **</label>
                  <div class="col-md-9">
                      <select name="group[0]" class="form-control">
                          <option value="">-- pilih grup angkatan --</option>
                          <option value="seni">seni</option>
                          <option value="craft">craft</option>
                          <option value="komputer">komputer</option>
                          <option value="desain">desain</option>
                      </select>
                      <span id="group_0" class="help-block"></span>
                  </div>
              </div>
            <div class="form-group">
                <label class="control-label col-md-3">no telp/handphone</label>
                <div class="col-md-9">
                    <input placeholder="contoh : +6287778784550" name="phone[0]" class="form-control"/>
                    <span id="phone_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">angkatan ke **</label>
                <div class="col-md-9">
                    <select name="angkatan[0]" class="form-control">
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                        <option value="1942">1942</option>
                        <option value="1941">1941</option>
                        <option value="1940">1940</option>
                        <option value="1939">1939</option>
                        <option value="1938">1938</option>
                        <option value="1937">1937</option>
                        <option value="1936">1936</option>
                        <option value="1935">1935</option>
                        <option value="1934">1934</option>
                        <option value="1933">1933</option>
                        <option value="1932">1932</option>
                        <option value="1931">1931</option>
                        <option value="1930">1930</option>
                        <option value="1929">1929</option>
                        <option value="1928">1928</option>
                        <option value="1927">1927</option>
                        <option value="1926">1926</option>
                        <option value="1925">1925</option>
                        <option value="1924">1924</option>
                        <option value="1923">1923</option>
                        <option value="1922">1922</option>
                        <option value="1921">1921</option>
                        <option value="1920">1920</option>
                        <option value="1919">1919</option>
                        <option value="1918">1918</option>
                        <option value="1917">1917</option>
                        <option value="1916">1916</option>
                        <option value="1915">1915</option>
                        <option value="1914">1914</option>
                        <option value="1913">1913</option>
                        <option value="1912">1912</option>
                        <option value="1911">1911</option>
                        <option value="1910">1910</option>
                        <option value="1909">1909</option>
                        <option value="1908">1908</option>
                        <option value="1907">1907</option>
                        <option value="1906">1906</option>
                        <option value="1905">1905</option>
                    </select>
                    <span id="angkatan_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">biography **</label>
                <div class="col-md-9">
                    <textarea placeholder="deskripsi alumni" name="biography[0]" class="form-control"></textarea>
                    <span id="biography_0" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
              <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar **</label>
              <div class="col-sm-9">
                <input id="fileInputHor" name="file_image[0]" type="file" class="dropify">
                <span id="file_image_0" class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <p>* <i style="color:red;">harus diisi</i> / ** <i style="color:red;">sangat di anjurkan diisi</i></p>
                <button type="button" onclick="bttn_adding_angkatan_field()" class="btn btn-outline btn-primary"><i class="ti-plus"></i> tambah field</button>
                </div>
            </div>
            <div id="angkatan-form"></div>
        </div>
        <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_c_angkatan()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<!-- end modal -->
<!-- modal for editing angkatan -->
<div id="modalform-edit" tabindex="-1" role="dialog" aria-labelledby="myAnimationModalLabel" class="modal animated fadeInLeft bs-example-modal-animation">
<div role="document" class="modal-dialog modal-lg">
    <form method="POST" id="c_angkatan_form_edit" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <h4 id="myAnimationModalLabel" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <!-- field by id -->
          <input type="hidden" value="" name="id" />
          <!-- field form each -->
          <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">nama depan alumni *</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="nama depan alumni" name="firstname" value=""/>
                  <span id="firstname" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">nama belakang alumni *</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="nama belakang alumni" name="lastname" value=""/>
                  <span id="lastname" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">email **</label>
                <div class="col-md-9">
                    <input placeholder="contoh : mnwnbk@gmail.com" name="email" class="form-control"/>
                    <span id="email" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">website</label>
                <div class="col-md-9">
                    <input placeholder="contoh : https://www.instgram.com/nama alumni" name="website" class="form-control"/>
                    <span id="website" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">no telp/handphone</label>
                <div class="col-md-9">
                    <input placeholder="contoh : +6287778784550" name="phone" class="form-control"/>
                    <span id="phone" class="help-block"></span>
                </div>
            </div>
              <div class="form-group">
                  <label class="control-label col-md-3">grup angkatan **</label>
                  <div class="col-md-9">
                      <select name="group" class="form-control">
                          <option value="">-- pilih grup angkatan --</option>
                          <option value="seni">seni</option>
                          <option value="craft">craft</option>
                          <option value="komputer">komputer</option>
                          <option value="desain">desain</option>
                      </select>
                      <span id="group" class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">angkatan ke **</label>
                <div class="col-md-9">
                    <select name="angkatan" class="form-control">
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                        <option value="1942">1942</option>
                        <option value="1941">1941</option>
                        <option value="1940">1940</option>
                        <option value="1939">1939</option>
                        <option value="1938">1938</option>
                        <option value="1937">1937</option>
                        <option value="1936">1936</option>
                        <option value="1935">1935</option>
                        <option value="1934">1934</option>
                        <option value="1933">1933</option>
                        <option value="1932">1932</option>
                        <option value="1931">1931</option>
                        <option value="1930">1930</option>
                        <option value="1929">1929</option>
                        <option value="1928">1928</option>
                        <option value="1927">1927</option>
                        <option value="1926">1926</option>
                        <option value="1925">1925</option>
                        <option value="1924">1924</option>
                        <option value="1923">1923</option>
                        <option value="1922">1922</option>
                        <option value="1921">1921</option>
                        <option value="1920">1920</option>
                        <option value="1919">1919</option>
                        <option value="1918">1918</option>
                        <option value="1917">1917</option>
                        <option value="1916">1916</option>
                        <option value="1915">1915</option>
                        <option value="1914">1914</option>
                        <option value="1913">1913</option>
                        <option value="1912">1912</option>
                        <option value="1911">1911</option>
                        <option value="1910">1910</option>
                        <option value="1909">1909</option>
                        <option value="1908">1908</option>
                        <option value="1907">1907</option>
                        <option value="1906">1906</option>
                        <option value="1905">1905</option>
                    </select>
                    <span id="angkatan" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">biography **</label>
                <div class="col-md-9">
                    <textarea placeholder="deskripsi alumni" name="biography" class="form-control"></textarea>
                    <span id="biography" class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
              <label for="fileInputHor" class="col-sm-3 control-label">berkas gambar</label>
              <div class="col-sm-9">
                <input id="fileInputHor" name="file_image" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="form-control">
                <span id="file_image" class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
                <label id="img-label" for="img-src" class="col-sm-3 control-label">gambar</label>
                <div class="col-sm-9">
                    <img id="img-src" width="200px" height="200px" class="img-thumbnail img-responsive"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <p>* <i style="color:red;">harus diisi</i> / ** <i style="color:red;">sangat di anjurkan diisi</i></p>
                </div>
            </div>
        </div>
        <!-- end field form -->
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-raised btn-default"><i class="ti-close"></i> tutup</button>
            <button type="submit" onclick="bttn_save_c_angkatan_edit()" id="btnSave" class="btn btn-raised btn-black"><i class="ti-save"></i> simpan perubahan</button>
        </div>
    </div>
    </form>
</div>
</div>
<script src="<?=base_url();?>assets/back-end/plugins/tinymce/tinymce.min.js"></script>
