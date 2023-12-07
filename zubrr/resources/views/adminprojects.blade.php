@php
    use App\Models\User;
    $users = User::where('id', '!=', auth()->user()->id)->get();
@endphp

@foreach($users as $user)
    <div class="flex items-center">
        <span class="text-gray-600">{{ $user->id }}</span>
        <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Button
        </button>
    </div>
@endforeach
