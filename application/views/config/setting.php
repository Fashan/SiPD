<div class="container">
  <div class="row justify-content-center" >


    <div class="col-md-8">
	<div class="card mt-3">
      <div class="card-body">
         <h1 class="text-capitalize text-center mb-3">Setting</h1>
          <hr class="my-3">
		  <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Judul</label>
    <input type="text" class="form-control title_setting" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email untuk public</label>
    <input type="email" class="form-control email_setting" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Whatsapp untuk public</label>
    <input type="number" class="form-control wa_setting" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Link Facebook</label>
    <input type="text" class="form-control fb_setting" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Link Instagram</label>
    <input type="text" class="form-control ig_setting" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Link Twitter</label>
    <input type="text" class="form-control twiter_setting" id="exampleFormControlInput1" >
  </div>
</form>
<label for="exampleFormControlInput1">Background</label>
<div class="d-flex flex-row bd-highlight mb-3 flex-wrap">
  <div class="p-2 bd-highlight"><button class="btn" onclick="bg1();">
	  <img src="<?= base_url('assets/images/bg_img/floor-tile.png'); ?>" alt="" style="height: 100px; width: 100px;">
	</button>
	<p class="text-center">Floor-Tile</p></div>
  <div class="p-2 bd-highlight">
	  <button class="btn" onclick="bg2();"><img src="<?= base_url('assets/images/bg_img/full-bloom.png'); ?>" alt="" style="height: 100px; width: 100px;"></button>
	  <p class="text-center">Full-Bloom</p>
	</div>
	<div class="p-2 bd-highlight">
	  <button class="btn" onclick="bg3();"><img src="<?= base_url('assets/images/bg_img/morocco-blue.png'); ?>" alt="" style="height: 100px; width: 100px;"></button>
	  <p class="text-center">Morocco-Blue</p>
	</div>
  <div class="p-2 bd-highlight">
	  <button class="btn" onclick="bg4();"><img src="<?= base_url('assets/images/bg_img/morocco.png'); ?>" alt="" style="height: 100px; width: 100px;"></button>
	  <p class="text-center">Morocco</p>
	</div>
  <div class="p-2 bd-highlight">
	  <button class="btn" onclick="bg5();"><img src="<?= base_url('assets/images/bg_img/oriental-tiles.png'); ?>" alt="" style="height: 100px; width: 100px;"></button>
	  <p class="text-center">Oriental-Tiles</p>
	</div>
  <div class="p-2 bd-highlight">
	  <button class="btn" onclick="bg6();"><img src="<?= base_url('assets/images/bg_img/sakura.png'); ?>" alt="" style="height: 100px; width: 100px;"></button>
	  <p class="text-center">Sakura</p>
	</div>
  <div class="p-2 bd-highlight" onclick="bg7();">
	  <button class="btn"><img src="<?= base_url('assets/images/bg_img/wheat.png'); ?>" alt="" style="height: 100px; width: 100px;"></button>
	  <p class="text-center">Wheat</p>
	</div>


</div>

            
<div class="form-group">
                    <label class="form-label" for="gambar_hero"><b>Gambar Layar Utama</b></label>
                    <div class="custom-file">
                        <input accept="image/*" type="file" class="custom-file-input" id="uploadhero" name="gambar_hero" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label nama_gambar" for="gambar_hero" id="filename"></label>
                    </div>
                </div>
<img class="gambar_hero" src="" alt="ada gambar" style="width: 50%;">
    </div>



	




