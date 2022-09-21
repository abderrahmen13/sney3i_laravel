@extends('dashboard.layouts.app')
@section('main-content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des societés</h5>
                        </div>
                        <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                            <form>
                                @csrf
                                <div class="input-group">
                                    <button type="submit"><span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span></button>
                                    <input type="text" class="form-control" name="company_name" placeholder="nom du societé..." onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger border-left-danger" role="alert">
                    <ul class="pl-4 my-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Societé ID</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Nom du sociéte</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Email</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Telephone</h6>
                                        </div>
                                    </th>
                                    <th class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Adresse</h6>
                                        </div>
                                    </th>
                                    <th class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">status</h6>
                                        </div>
                                    </th>
                                    <th class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">date d'inscription</h6>
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
                                            {{$item->id}}
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">{{$item->name}}</td>
                                    <td class="align-middle text-center">{{$item->email}}</td>
                                    <td class="align-middle text-center">{{$item->phone}}</td>
                                    <td class="align-middle text-center">{{$item->adress}}</td>
                                    <td class="align-middle text-center">{{$item->status}}</td>
                                    <td class="align-middle text-center">{{$item->created_at}}</td>
                                    <td>
                                        @if($item->status == 'verified' || $item->status == 'rejected')
                                        @if($item->deleted_at)
                                        <form action="{{route('company.restore')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="company_id" value="{{$item->id}}" />
                                            <input type="submit" value="Restore" name="status" class="btn bg-gradient-success" />
                                        </form>


                                        @else
                                        <form action="{{route('company.delete')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="company_id" value="{{$item->id}}" />
                                            <input type="submit" value="Delete" name="status" class="btn bg-gradient-danger" />
                                        </form>


                                        @endif
                                        @else
                                        <form action="{{route('company.verification')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="company_id" value="{{$item->id}}" />
                                            <input type="submit" value="Accept" name="status" class="btn bg-gradient-success" />
                                        </form>

                                        <form action="{{route('company.verification')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="company_id" value="{{$item->id}}" />
                                            <input type="submit" value="Reject" name="status" class="btn bg-gradient-danger" />
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$items->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection