@extends('projek_akhir.blank')

@section('header-content')
<h1>My Profile </h1>
@endsection

@section('sidebar-tools')
<li><a class="nav-link" href="#">my transaction</a></li>
@endsection

@section('content')
<br>
<div class="col-12 col-md-12 ">
    <div class="card profile-widget">
      <div class="profile-widget-header">                     
        <img alt="image" src="{{asset('stisla/assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
        <div class="profile-widget-items">
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">Role</div>
            <div class="profile-widget-item-value"></div>
          </div>
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">id</div>
            <div class="profile-widget-item-value"></div>
          </div>
          <div class="profile-widget-item">
            <div class="profile-widget-item-label">phone</div>
            <div class="profile-widget-item-value"></div>
          </div>
        </div>
      </div>
      <div class="profile-widget-description">
        <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"> </div></div>
        Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
      </div>
      
    </div>
  </div>
@endsection
