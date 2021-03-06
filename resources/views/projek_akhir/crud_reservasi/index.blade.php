@extends('projek_akhir.blank')

@push('style')
     <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endpush

@push('script-head')
    
@endpush

@section('header-content')
<h1>Reservation </h1>
@endsection

@section('sidebar-tools')
@if (Auth::user()->role=='penyedia')
  <li><a class="hotelin" href="../../hotel/create">Register Hotel</a></li>
  <li><a class="" href="../../reservasi">My Orders</a></li>
@else
<li><a class="" href="../../reservasi">My Transaction</a></li>
@endif
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>List Of Transaction</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            @if (Auth::user()->role!='penyedia')
                            <div class="col-sm-12">
                                 <a href="{{route('reservasi.create')}}" class="btn btn-primary btn-md ml-3 ">Tambahkan Reservasi</a>
                                 <br><br>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                    aria-describedby="table-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Id Penyewa
                                            </th>
                                            <th>
                                                Kamar
                                            </th>
                                            <th>
                                                Check In
                                            </th>
                                            <th>
                                                Check Out
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservasi as $key => $item) 
                                        <tr role="row" class="odd">
                                            <td>{{$key + $reservasi->firstitem()}}    
                                            </td>
                                            <td>{{$item ->profile_id}}</td>
                                            <td> @if ($item->kamar_id==1)
                                                <p>Single Bed</p>
                                            @else
                                                <p>Double Bed</p>
                                            @endif</td>
                                            <td>{{$item ->tggl_checkin}}</td>
                                            <td>{{$item ->tggl_checkout}}</td>
                                            <td>
                                                @if ($item->status == "Menunggu Pembayaran") 
                                                <div class="badge badge-warning">{{$item ->status}}</div>
                                                @elseif($item->status == "Cancelled")
                                                <div class="badge badge-danger">{{$item ->status}}</div>
                                                @else
                                                <div class="badge badge-info">{{$item ->status}}</div>
                                                @endif
                                                
                                            </td>
                                            <td>
                                            <form action="{{route('reservasi.destroy', ['reservasi'=>$item->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('reservasi.show', ['reservasi'=>$item->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                @if(auth::user()->role=='penyedia')
                                                    <a href="{{route('reservasi.edit', ['reservasi'=>$item->id])}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                                @endif
                                                @if(auth::user()->role=='penyedia')
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                                @endif
                                            </form>
                                        </tr>
                                        @endforeach  
                                    </tbody>
                                </table>
                                {{$reservasi->links()}}
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="table-1_info" role="status" aria-live="polite">Showing
                                    1 to 4 of 4 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="table-1_previous"><a
                                                href="#" aria-controls="table-1" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="table-1"
                                                data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item next disabled" id="table-1_next"><a
                                                href="#" aria-controls="table-1" data-dt-idx="2" tabindex="0"
                                                class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
      <!-- JS Libraies -->
  <script src="{{asset('stisla/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('stisla/assets/js/page/modules-datatables.js')}}"></script>
@endpush