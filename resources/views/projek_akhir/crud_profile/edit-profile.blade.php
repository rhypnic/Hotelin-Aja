@extends('projek_akhir.blank')

@push ('script-head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('header-content')
<h1> Create Hotel </h1>
@endsection



@section('content')
<form method="post" action="/profile/{{Auth::user()->profile->id}}" role="form" class="needs-validation" novalidate="">
    @csrf
    @method('PUT')
                    <div class="card-header">
                     <h4> {{Auth::user()->profile->nama}}'s Profile</h4 >
                      
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Real Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->profile->nama}}" name="nama" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" required="" disabled>
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="{{Auth::user()->profile->phone_number}}" name="phone_number">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            {{-- <input type="body" class="form-control" id="body" name="deskripsi" value="{{old('deskripsi', '') }}" placeholder="buat deskripsi" required> --}}
                            <textarea name="deskripsi" value="{{old('deskripsi', '') }}" class="form-control my-editor">{!! old('deskripsi', $deskripsi ?? '') !!}</textarea>
                          </div>
                        </div>
                        
                    </div>
                    <div class="text-right">
                     
                      
                     
                      <button class="btn btn-primary">Save Changes</button>
                 
                 </form>
                  
                  </div>
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