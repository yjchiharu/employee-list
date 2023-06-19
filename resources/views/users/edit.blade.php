@extends('layouts.app')

@section('title', 'Edit')

@section('content')

<div class="container">
    <h3 class="mb-3">Edit Employee</h3>

    <div class="row justify-content-center">
        <form action="{{ route('user.update') }}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">

                {{-- Error --}}
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="department" class="form-label fw-bold">Department</label>
                <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $user->department) }}">
    
                {{-- Error --}}
                @error('department')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label fw-bold">Salary</label>
                <input type="text" name="salary" id="salary" class="form-control" value="{{ old('salary', $user->salary) }}">

                {{-- Error --}}
                @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">

                {{-- Error --}}
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <a class="btn btn-secondary px-5">Back</a>
            <button type="submit" class="btn btn-warning px-5">Save</button>

        </form>
        
    </div>
</div>

    
@endsection

