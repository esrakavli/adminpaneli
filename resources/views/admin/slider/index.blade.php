@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('slider.create')}}" class="btn btn-success">Yeni slider Ekle</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Sliderler</h4>
                            <p class="category">Eklenen sliderların listesini bulabilirsiniz</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Önizleme</th>
                                <th>Düzenle</th>
                                <th>Sil</th>

                                </thead>
                                <tbody>
                                @foreach($data as $key=>$value)
                                    <tr>
                                        <td><img src="{{asset($value['image'])}}" style="width: 120px;height: 120px" alt=""></td>
                                        <td><a href="{{route('slider.edit',['id'=>$value['id']])}}">Duzenle</a> </td>

                                        <td ><a href="{{route('slider.delete',['id'=>$value['id']])}}">sil</a> </td>
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
