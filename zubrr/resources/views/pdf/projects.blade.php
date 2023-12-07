@php
    use 
@endphp    use App\Models\Projects;
    use Illuminate\Support\Facades\Auth;
    $projects1 = Projects::where('user_id', $user->id)->get();
   
@endphp
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style>
    body { font-family: DejaVu Sans, sans-serif; }
</style>
<body>
    

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
            {{$project->projectnames}}
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
    </body>
</html>