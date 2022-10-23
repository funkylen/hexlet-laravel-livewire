{{-- NOTE: Важно, чтобы livewire компонент был обернут в один тэг --}}
<div>
    <form class="mb-5" wire:submit.prevent="store">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('form.email') is-invalid @enderror" id="email"
                wire:model="form.email">

            @error('form.email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('form.name') is-invalid @enderror" id="name"
                wire:model="form.name">

            @error('form.name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="count" class="form-label">Count</label>
            <div class="d-flex w-50">
                <button class="btn btn-outline-danger" wire:click="decrement">-</button>
                <input class="form-control w-25 me-2 ms-2" type="number" wire:model="form.count" disabled id="count">
                <button class="btn btn-outline-success" wire:click="increment">+</button>
            </div>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="agree"
                name="terms" wire:model="terms">
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
                <th>Count</th>
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
                    <td>{{ $form->count }}</td>
                    <td>{{ $form->created_at }}</td>
                    <td>{{ $form->updated_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $forms->links() }}

</div>
