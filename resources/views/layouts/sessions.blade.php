@if ($errors->any())
    <div class="alert alert-danger w-75 mx-auto mt-5">
        <div class="font-medium text-red-600">
            {{ __('global.wrong_data') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success w-75 mx-auto mt-5">
        <div class="font-medium text-red-600">
            {{ session()->get('success') }}
        </div>
    </div>
@endif
