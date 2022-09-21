@extends('dashboard.layouts.app')
@section('main-content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des Proffessionel</h5>
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
                    @if(auth()->user()->role == 'societe')
                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#proffessionelModal">
                        Creer proffessionel
                    </button>
                    @endif

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
                                            <h6 class="mb-0 text-sm">Proffessionel ID</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Nom du Proffessionel</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Sexe</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">CIN</h6>
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
                                            <h6 class="mb-0 text-sm">Sociéte</h6>
                                        </div>
                                    </th>
                                    <th colspan="2" class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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

                                    <td class="">
                                        <img src="{{ url('proffessionel/'.$item->image) }}" style="height: 70px; width: 70px;" />
                                        {{$item->first_name}} {{$item->last_name}}
                                    </td>
                                    <td class="align-middle text-center">{{$item->gender}}</td>
                                    <td class="align-middle text-center">{{$item->cin}}</td>
                                    <td class="align-middle text-center"> {{$item->email}}</td>
                                    <td class="align-middle text-center">{{$item->phone}}</td>
                                    <td class="align-middle text-center">{{$item->adress}}</td>
                                    <td class="align-middle text-center">
                                        {!! !empty($item->parent_name) ? $item->parent_name : 'personnel' !!}
                                    </td>

                                    <td>
                                        @if($item->status == 'verified')
                                        @if($item->deleted_at)
                                        <form action="{{route('prof.restore')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="prof_id" value="{{$item->id}}" />
                                            <input type="submit" value="Restore" name="status" class="btn bg-gradient-success" />
                                        </form>


                                        @else
                                        <form action="{{route('prof.delete')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="prof_id" value="{{$item->id}}" />
                                            <input type="submit" value="Delete" name="status" class="btn bg-gradient-danger" />
                                        </form>


                                        @endif
                                        @else
                                        <form action="{{route('prof.verification')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="prof_id" value="{{$item->id}}" />
                                            <input type="submit" value="Accept" name="status" class="btn bg-gradient-success" />
                                        </form>

                                        <form action="{{route('prof.verification')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="prof_id" value="{{$item->id}}" />
                                            <input type="submit" value="Reject" name="status" class="btn bg-gradient-danger" />
                                        </form>
                                        @endif
                                    </td>
                                    @if(auth()->user()->role == 'societe')
                                    <td class="align-middle text-center">
                                        <a class="btn bg-gradient-success">update </a>

                                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#proffessionelCategoryModal-{{$item->id}}">
                                        ajouter category
                                    </button>
                                    </td>
                           


                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->role == 'societe')
    <!-- create category modal -->
    <div class="modal match-modal fade" id="proffessionelModal" tabindex="-1" aria-labelledby="categoryModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter PROFFESSIONEL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{route('prof.store')}}" class="m-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">NOM DU PROFFESSIONEL
                        </label>
                        <input name="last_name" class="form-control" type="text" id="example-text-input">
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">PRENOM DU PROFFESSIONEL
                        </label>
                        <input name="first_name" class="form-control" type="text" id="example-text-input">
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">SEXE</label>
                        </br>
                        <input name="gender" type="radio" value="homme" id="example-text-input"> <label for="huey">Homme</label>
                        </br>
                        <input name="gender" type="radio" value="famme" id="example-text-input"> <label for="huey">Femme</label>

                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">CIN</label>
                        <input name="cin" class="form-control" type="text" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email</label>
                        <input name="email" class="form-control" type="email" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Telephone</label>
                        <input name="phone" class="form-control" type="text" id="example-text-input">
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Date du naissance</label>
                        <input name="birthday" class="form-control" type="date" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Adresse</label>
                        <input name="adress" class="form-control" type="text" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Photo</label>
                        <input name="picture" class="form-control" type="file" id="example-text-input">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn bg-gradient-primary">Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($items as $item)
    <div class="modal match-modal fade" id="proffessionelCategoryModal-{{$item->id}}" tabindex="-1" aria-labelledby="categoryModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PROFFESSIONEL Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{route('prof_affect_category')}}" class="m-4" enctype="multipart/form-data">
                    @csrf
                 <input hidden name="prof_id" value="{{$item->id}}"/>
                    @foreach($categorys as $category)
                    <h5 class="modal-title" id="exampleModalLabel">{{$category->name}}</h5>
                    <div class="form-group">
                        <fieldset>
                            @foreach($category->sub_category_items as $sub_cateogry)
                            <div>
                                <input type="checkbox" id="scales" name="categorys[]" value="{{$sub_cateogry->id}}">
                                <label for="scales">{{$sub_cateogry->name}}</label>
                            </div>
                            @endforeach
                        </fieldset>
                    </div>
                    @endforeach

                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn bg-gradient-primary">Creer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif

</div>




@endsection