@extends('projek_akhir.blank')

@section('header-content')
<h1>My Profile </h1>
@endsection

@section('sidebar-tools')

@endsection

@section('content')
@if (config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false )
    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
@endif
@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif
    @if (config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false)
        <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
    @endif
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif
<br>
<div class="col-12 col-md-12 ">
    <div class="card profile-widget">
      <div class="profile-widget-header">                     
        <img alt="image" src="{{asset('stisla/assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
        <div class="profile-widget-items">
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">Role</div>
            <div class="profile-widget-item-value">{{Auth::user()->role}}</div>
          </div>
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">id</div>
            <div class="profile-widget-item-value">{{Auth::user()->id}}</div>
          </div>
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">phone</div>
            <div class="profile-widget-item-value">{{Auth::user()->profile->phone_number}}</div>
          </div>
        </div>
      </div>
      <div class="profile-widget-description">
        <div class="profile-widget-name"> {{Auth::user()->profile->nama}} / {{Auth::user()->email}}<div class="text-muted d-inline font-weight-normal"> </div></div>
        {{Auth::user()->profile->deskripsi}} 
      </div>
      
    </div>
    <form action="/profile/{{Auth::user()->profile->id}}" method="post" class=text-right>
    @csrf
    @method('DELETE')
   <input type="submit" value="Delete Account" class="btn btn-danger btn-sm">
  </form>
  </div>
  
@endsection
