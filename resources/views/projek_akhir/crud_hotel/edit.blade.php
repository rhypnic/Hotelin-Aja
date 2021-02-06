@extends('projek_akhir.blank')

@section('sidebar-tools')
@if (Auth::user()->role==1)
  <li><a class="hotelin" href="hotel/create">Register Hotel</a></li>
@else
  <li><a class="" href="#">My Transaction</a></li>
@endif
@endsection

@push ('script-head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="stisla/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>
<script src="../node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="../node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- Template JS File -->
<script src="stisla/assets/js/scripts.js"></script>
<script src="stisla/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="stisla/assets/js/page/features-post-create.js"></script>
@endpush
<link rel="stylesheet" href="stisla/assets/css/style.css">
<link rel="stylesheet" href="stisla/assets/css/components.css">
@section('content')
<form role="form" action="/hotel/{{$hotel->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Hotel</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="nama_hotel">
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Kamar</label>
          <div class="col-sm-12 col-md-7">
            <select class="form-control selectric" name="kategori">
              <option>Single Bed</option>
              <option>Twin Bed</option>
            </select>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
          <div class="col-sm-12 col-md-7">
            <textarea class="summernote-simple" style="margin-top: 0px; margin-bottom: 0px; height: 76px;" name="deskripsi"></textarea>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Photo Hotel</label>
          <div class="col-sm-12 col-md-7">
            <div id="image-preview" class="image-preview">
              <label for="image-upload" id="image-label">Choose File</label>
              <input type="file" name="gambar_hotel" id="image-upload">
            </div>
          </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control inputtags" name="alamat">
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga/malam</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control inputtags" name="harga">
            </div>
          </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7">
            <button type="submit" class="btn btn-primary">Create Hotel</button>
          </div>
        </div>
      </div>
</form>
@endsection
