@extends('projek_akhir.blank')



@section('content')
<div class="section-body">
            <h2 class="section-title">Hotel Anda</h2>
            
            <div class="card" style="width: 30rem;"  style="height: 15rem";>
              <div class="card-header">
                <h4>{{$reservasi->profile_id}}</h4>
              </div>
              <div class="card-body">
                <p>{{$reservasi->kamar_id}}</p>
              </div>
              <div class="row">
                  <div class="card-footer bg-whitesmoke">
                    Harga/malam = {{$reservasi->tggl_checkin}}
                  </div>
                  <div class="card-footer bg-whitesmoke">
                      Alamat = {{$reservasi->tggl_checkout}}
                  </div>
                  <div class="card-footer bg-whitesmoke">
                      Status = {{$reservasi->status}}
                  </div>

              </div>
            </div>
            
          </div>
@endsection

