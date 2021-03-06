@extends('projek_akhir.blank')


@section('sidebar-tools')
@if (Auth::user()->role=='penyedia')
  <li><a class="hotelin" href="../../hotel/create">Register Hotel</a></li>
  <li><a class="" href="../../reservasi">My Orders</a></li>
@else
<li><a class="" href="../../reservasi">My Transaction</a></li>
@endif
@endsection

@section('header-content')
<h1> your transaction </h1>
@endsection

@section('content')
<div class="section-body">
            <h2 class="section-title">{{$reservasi->nama_hotel}}</h2>
            
            <div class="card" style="width: 30rem;"  style="height: 15rem";>
              <div class="card-header">
                <h4>{{Auth::user()->profile->nama}}</h4>
              </div>
              <div class="card-body">
                @if ($reservasi->kamar_id==1)
                    <p>Single Bed </p>
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
            <a href="{{route('reservasi.index')}}"><input type="submit"  class="btn btn-primary btn-sm" value="Kembali"></a>
          </div>
@endsection

