@extends('layout')
@section('title', 'Registration')
@section('content')
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <p>tvoyid: {{auth()->user()->id}}</p>
  <p>projectN:{{auth()->user()->projectn}}</p>
  <p>ProjectDescription:{{auth()->user()->projecttarget}}</p>

  <div class="relative overflow-x-auto">
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-50">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">
            ID
          </th>
          <th scope="col" class="px-6 py-3">
            Наименование Мероприятия
          </th>
          <th scope="col" class="px-6 py-3">
            Начало
          </th>
          <th scope="col" class="px-6 py-3">
            Окончания
          </th>
          <th scope="col" class="px-6 py-3">
            Результат от реализации мероприятия
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($projects1 as $project)
        <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
            {{$project->id}}
          </th>
          <td class="px-6 py-4 text-black">
            {{$project->projectname}}
          </td>
          <td class="px-6 py-4 text-black">
            {{$project->start}} 
          </td>
          <td class="px-6 py-4 text-black">
            {{$project->end}}
          </td>
          <td class="px-6 py-4 text-black">
            {{$project->desc}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
   
    <table class="w-full text-sm text-left rtl:text-right text-gray-50">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3">
            ID
          </th>
          <th scope="col" class="px-6 py-3">
            Статья затрат проекта
          </th>
          <th scope="col" class="px-6 py-3">
            1кв
          </th>
          <th scope="col" class="px-6 py-3">
            2кв
          </th>
          <th scope="col" class="px-6 py-3">
            3кв
          </th>
          <th scope="col" class="px-6 py-3">
            4кв
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($projects1 as $project)
        <tr class="bg-white border-b">
          <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
            {{$project->id}}
          </th>
          <td class="px-6 py-4 text-black">
            {{$project->state}}
          </td>
          <td class="px-6 py-4 text-black">
            {{$project->kv1}}
          </td>
          <td class="px-6 py-4 text-black">
            {{$project->kv2}}
          </td>
          <td class="px-6 py-4 text-black">
            {{$project->kv3}}
          </td>
          <td class="px-6 py-4 text-black">
            {{$project->kv4}}
          </td>
        </tr>
        @endforeach
        
      </tbody>

        
    </table>
    <form action="{{ route('import_user')}}" method="POST" enctype="multipart/form-data">
    @csrf
   <input type="file" name="excel_file">
   <button type="submit">Upload Excel file</button>
   
    @error('excel_file')

   <p>{{$message}}</p>
   @enderror
  </form>
  
        

  </div>
    <div>
        @if(Session::has('success'))
        <h1>Succesfully</h1>
        @endif
    </div>
  


  <a href="{{route('logout')}}" class="block px-4 py-2 mt-4 text-sm text-gray-700">Sign out</a>
  <a  href="{{ route('export_user_pdf') }}"><button>make a pdf</button></a>
</body>     
</html>
@endsection 