@extends('dashboard.layouts.app')
@section('main-content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des reclamations</h5>
                        </div>

                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">client</h6>
                                        </div>
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">proffesionnel</h6>
                                        </div>
                                    </th>



                                    <th colspan="6" class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">contenu</h6>
                                        </div>
                                    </th>

                                    <th  class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">status</h6>
                                        </div>
                                    </th>

                                    <th class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">date du reclamation</h6>
                                        </div>
                                    </th>

                                    <th class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Action</h6>
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($items as $item)
                                <tr>
                                    <td class="align-middle text-center">
                                        <a data-bs-toggle="modal" data-bs-target="#modalmatchlist">
                                            {{$item->user_name}}
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a data-bs-toggle="modal" data-bs-target="#modalmatchlist">
                                            {{$item->proffessionel_name}}
                                        </a>
                                    </td>
                                    <td colspan="6" class="align-middle text-center">
                                                {{$item->content}}
                                    </td>

                                    <td  class="align-middle text-center">
                                                {{$item->status}}
                                    </td>

                                    <td  class="align-middle text-center">
                                                {{$item->created_at}}
                                    </td>

                                    <td class="align-middle text-center">
                                    @if($item->status == "pending")
                                        <form action="{{route('reclamation.update')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="reclamation_id" value="{{$item->id}}" />
                                            <input type="submit" value="Resolu" name="status" class="btn bg-gradient-success" />
                                        </form>

                                        <form action="{{route('reclamation.update')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="reclamation_id" value="{{$item->id}}" />
                                            <input type="submit" value="Non Resolu" name="status" class="btn bg-gradient-danger" />
                                        </form>


                                        @endif
                                  
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection