@extends('layouts.static')

@section('title', 'Server Side Form')

@section('content')
    <h2 class="mb-3">Server Side Form</h2>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('form.store') }}" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('form.email') is-invalid @enderror" id="email"
                name="form[email]" value="{{ old('form.email') }}">

            @error('form.email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('form.name') is-invalid @enderror" id="name"
                name="form[name]" value={{ old('form.name') }}>

            @error('form.name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="agree"
                name="terms" @checked(old('terms'))>
            <label class="form-check-label" for="agree">Agree with terms</label>

            @error('terms')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h3>Records</h3>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($forms as $form)
                <tr>
                    <td>{{ $form->id }}</td>
                    <td>{{ $form->name }}</td>
                    <td>{{ $form->email }}</td>
                    <td>{{ $form->created_at }}</td>
                    <td>{{ $form->updated_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $forms->links() }}
@endsection
