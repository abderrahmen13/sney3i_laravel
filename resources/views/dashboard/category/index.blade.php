@extends('dashboard.layouts.app')
@section('main-content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des profession</h5>
                        </div>

                    </div>

                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        Creer PROFESSION
                    </button>

                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#subcategoryModal">
                        Creer category
                    </button>

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
                                            <a class="mb-0 text-sm">profession ID</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Nom du profession</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Nombre de categories</h6>
                                        </div>
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Nombre de proffessionel</h6>
                                        </div>
                                    </th>

                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                        <a data-bs-toggle="modal" data-bs-target="#sub_category_modal-{{$item->id}}" data-list="{{ $item->sub_category_items }}">
                                            {{$item->id}}

                                        </a>
                                    </td>
                                    <td class="">
                                        <img src="{{ url('icon/'.$item->icon) }}" style="height: 70px; width: 70px;" />
                                        {{$item->name}}
                                    </td>
                                    <td class="align-middle text-center"> {{count($item->sub_category_items)}} </td>
                                    <td class="align-middle text-center">{{$item->professionel_count}}</td>
                                    <td>
                                        @if($item->deleted_at)
                                        <form action="{{route('category.restore')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="category_id" value="{{$item->id}}" />
                                            <input type="submit" value="Restore" name="status" class="btn bg-gradient-success" />
                                        </form>
                                        @else
                                        <form action="{{route('category.delete')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="category_id" value="{{$item->id}}" />
                                            <input type="submit" value="Delete" name="status" class="btn bg-gradient-danger" />
                                        </form>

                                        @endif
                                        <button  data-bs-toggle="modal" data-bs-target="#sub_category_modal-{{$item->id}}" data-list="{{ $item->sub_category_items }}"  type="text" name="" value=" categorie" class="btn bg-gradient-success" >  categorie </button>
         
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

    <!-- create category modal -->
    <div class="modal match-modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter PROFESSION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{route('category.store')}}" class="m-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nom du PROFESSION</label>
                        <input name="name" class="form-control" type="text" id="example-text-input">
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">icon du PROFESSION</label>
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



    <!-- create sub category modal -->
    <div class="modal match-modal fade" id="subcategoryModal" tabindex="-1" aria-labelledby="subcategoryModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{route('sous_category.store')}}" class="m-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nom du  category</label>
                        <input name="sous_category_name" class="form-control" type="text" id="example-text-input">
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nom du profession</label>
                        <select name="category_id" class="form-control" type="text" id="example-text-input">
                            <option>Choizisser la profession</option>
                            @foreach($items as $item)
                            <option value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">icon du profession</label>
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
    <!-- sub category list modal -->
    <div class="modal match-modal fade" id="sub_category_modal-{{$item->id}}" tabindex="-1" aria-labelledby="sub_category_modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                <div class="dalign-middle text-center">
                                    <a class="mb-0 text-sm">Category ID</h6>
                                </div>
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                <div class="dalign-middle text-center">
                                    <h6 class="mb-0 text-sm">Nom du Category</h6>
                                </div>
                            </th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                <div class="dalign-middle text-center">
                                    <h6 class="mb-0 text-sm">Nombre de proffessionel</h6>
                                </div>
                            </th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                <div class="dalign-middle text-center">
                                    <h6 class="mb-0 text-sm">Action</h6>
                                </div>
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse($item->sub_category_items as $item)
                        <tr>
                            <td class="align-middle text-center">
                                <a data-bs-toggle="modal" data-bs-target="#sub_category_modal-{{$item->id}}" data-list="{{ $item->sub_category_items }}">
                                    {{$item->id}}

                                </a>
                            </td>
                            <td class="">
                                <img src="{{ url('icon/'.$item->icon) }}" style="height: 70px; width: 70px;" />
                                {{$item->name}}
                            </td>

                            <td class="align-middle text-center">{{$item->professionel_count}}</td>
                            <td>
                                @if($item->deleted_at)
                                <form action="{{route('sub_category.restore')}}" method="POST">
                                    @csrf
                                    <input hidden type="text" name="category_id" value="{{$item->id}}" />
                                    <input type="submit" value="Restore" name="status" class="btn bg-gradient-success" />
                                </form>
                                @else
                                <form action="{{route('sub_category.delete')}}" method="POST">
                                    @csrf
                                    <input hidden type="text" name="category_id" value="{{$item->id}}" />
                                    <input type="submit" value="Delete" name="status" class="btn bg-gradient-danger" />
                                </form>


                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="align-middle text-center" colspan="6">    <h6>No sub category found</h6> </td>
                        </tr>
                     
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection