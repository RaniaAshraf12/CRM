<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi .......<b> {{Auth::user()->name}}</b>
            <b style="float: right"> Total Users
            <span class="badge bg-danger">{{ count($Users) }}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created_At</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php ($i=1)
                                @foreach ($Users as $user)
                                    
                              
                              <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{Carbon\Carbon::parse($user->created_at)->DiffForHumans()}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>







            </div>
        </div>
    </div>
</x-app-layout>
