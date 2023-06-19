@extends('layouts.app')

@section('title', 'Explore People')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <h6 class="h4 text-center mb-5 mt-4">- Search Results for <span class="fw-bold">{{ $search }}</span> -</h6>
        </div>

        <table class="table table-hover align-middle border text-secondary">
            @foreach($users as $user)
                <tr class="text-center">
                    <td>
                        <p class="h6 text-muted mb-2">{{ $user->name }}</p>
                    </td>
                    <td>
                        <button class="btn btn-outline-success px-3" data-bs-toggle="modal"
                                data-bs-target="#user-more-{{ $user->id }}"> Details </button>
                    @include('users.modal.more') 
                    </td>    
                </tr>
            @endforeach      
        </table>     
    </div>
</div>
@endsection