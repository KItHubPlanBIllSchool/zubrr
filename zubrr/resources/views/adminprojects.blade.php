@php
    use App\Models\User;
    $users = User::where('id', '!=', auth()->user()->id)->get();
    
@endphp

@foreach($users as $user)
    <div class="flex items-center">
        <span class="text-gray-600">{{ $user->id }}</span>
        <span class="text-gray-600">{{ $user->email }}</span>
        <a href="{{ route('welcome', ['user' => $user]) }}">
            <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                напомнить
            </button>
        </a>
    </div>
@endforeach
