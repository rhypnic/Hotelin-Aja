@extends('projek_akhir.blank')


@section('sidebar-tools')
<li><a class="nav-link" href="../../reservasi">my transaction</a></li>
@endsection

@section('content')
<div class="section-body">
            <h2 class="section-title">Hotel Anda</h2>
            
            <div class="card" style="width: 30rem;"  style="height: 15rem";>
              <div class="card-header">
                <h4>{{Auth::user()->profile->nama}}</h4>
              </div>
              <div class="card-body">
                @if ($reservasi->kamar_id==1)
                    <p>Single Bed</p>
                @else
                    <p>Double Bed</p>
                @endif
              </div>
              <div class="row">
                <ul>
                  <div class="card-footer bg-whitesmoke">
                    Checkin= {{$reservasi->tggl_checkin}}
                  </div>
                  <div class="card-footer bg-whitesmoke">
                      Checkout = {{$reservasi->tggl_checkout}}
                  </div>
                  <div class="card-footer bg-whitesmoke">
                      Status = {{$reservasi->status}}
                  </div>
                </ul>
              </div>
            </div>
            
          </div>
@endsection

