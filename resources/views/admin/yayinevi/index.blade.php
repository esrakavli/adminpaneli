@extends('layouts.admin')

@section('content')
   <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('yayinevi.create')}}" class="btn btn-success">Yeni YayınEvi Ekle</a>
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Yayın Evleri</h4>
                        <p class="category">Eklenen yayın evleri listesini bulabilirsiniz</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>İsim</th>
                            <th>Düzenle</th>
                            <th>Sil</th>

                            </thead>
                            <tbody>
                            @foreach($data as $key=>$value)
                            <tr>
                                <td>{{$value['name']}}</td>
                                <td><a href="{{route('yayinevi.edit',['id'=>$value['id']])}}">Duzenle</a> </td>

                                <td ><a href="{{route('yayinevi.delete',['id'=>$value['id']])}}">sil</a> </td>
                            </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{$data->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection
