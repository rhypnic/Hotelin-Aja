@extends('projek_akhir.blank')

@push ('script-head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('header-content')
<h1> Edit My Profile </h1>
@endsection

@section('sidebar-tools')
<li><a class="nav-link" href="#">my transaction</a></li>
@endsection

@section('content')
<form method="get" action="/show/profile" class="needs-validation" novalidate="">
    @csrf
                    <div class="card-header">
                      <h4> Profile</h4>
                     
                      
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" value="Ujang" name="nama" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="ujang@maman.com" required="" disabled>
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="" name="phone_number">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            {{-- <input type="body" class="form-control" id="body" name="deskripsi" value="{{old('deskripsi', '') }}" placeholder="buat deskripsi" required> --}}
                            <textarea name="deskripsi" class="form-control my-editor">{!! old('deskripsi', $deskripsi ?? '') !!}</textarea>
                          </div>
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-between">
                     
                      
                      <form action="#" method="post">
                        @csrf
                        @method('DELETE')
                       <input type="submit" value="Delete Account" class="btn btn-danger btn-sm">
                      </form>
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                     
                        
                      
                  </form>
                  
@endsection
@push('scripts')
<script>
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endpush