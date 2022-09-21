@extends('dashboard.layouts.app')
@section('main-content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des clients</h5>
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
                                            <h6 class="mb-0 text-sm">CLIENT ID</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Nom</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Adress</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">sexe</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">email</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">telephone</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">cin</h6>
                                        </div>
                                    </th>

                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">date d'inscription</h6>
                                        </div>
                                    </th>
                                    <th>
                                    <h6 class="mb-0 text-sm">Action</h6>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td class="align-middle text-center">
                                        {{$item->id}}
                                    </td>
                                    <td class="align-middle text-center">{{$item->first_name}} {{$item->last_name}}</td>
                                    <td class="align-middle text-center">{{$item->adress}}</td>
                                    <td class="align-middle text-center">{{$item->gender}}</td>
                                    <td class="align-middle text-center">{{$item->email}}</td>
                                    <td class="align-middle text-center">{{$item->phone}}</td>
                                    <td class="align-middle text-center">{{$item->cin}}</td>
                                    <td class="align-middle text-center">{{$item->created_at}}</td>
                                    <td>
                                        @if($item->status == 'verified')
                                        @if($item->deleted_at)
                                        <form action="{{route('client.restore')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="client_id" value="{{$item->id}}" />
                                            <input type="submit" value="Restore" name="status" class="btn bg-gradient-success" />
                                        </form>


                                        @else
                                        <form action="{{route('client.delete')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="client_id" value="{{$item->id}}" />
                                            <input type="submit" value="Delete" name="status" class="btn bg-gradient-danger" />
                                        </form>


                                        @endif
                                        @else
                                        <form action="{{route('client.verification')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="client_id" value="{{$item->id}}" />
                                            <input type="submit" value="Accept" name="status" class="btn bg-gradient-success" />
                                        </form>

                                        <form action="{{route('client.verification')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="client_id" value="{{$item->id}}" />
                                            <input type="submit" value="Reject" name="status" class="btn bg-gradient-danger" />
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