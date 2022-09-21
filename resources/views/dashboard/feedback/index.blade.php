@extends('dashboard.layouts.app')
@section('main-content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Liste des Feedback</h5>
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
                                            <h6 class="mb-0 text-sm">Feedback ID</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Fullname</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Phone</h6>
                                        </div>
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Email</h6>
                                        </div>
                                    </th>

                                    <th colspan="6" class="text-centerp text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <div class="dalign-middle text-center">
                                            <h6 class="mb-0 text-sm">Contenu</h6>
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
                                    <td class="align-middle text-center">
                                        {{$item->fullname}}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{$item->phone}}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{$item->email}}
                                    </td>
                                    <td colspan="6" class="align-middle text-center">
                                            <p>
                                                {{$item->content}}
                                            </p>
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