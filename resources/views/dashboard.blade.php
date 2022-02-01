<style>
    .btn {
        @apply font-bold py-2 px-4 rounded;
    }
    .btn-blue {
        @apply bg-blue-500 text-white;
    }
    .btn-blue:hover {
        @apply bg-blue-700;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="border-collapse border border-slate-400">
                        <thead>
                        <tr>
                            <th class="border border-slate-300">Name</th>
                            <th class="border border-slate-300">Phone</th>
                            <th class="border border-slate-300">Email</th>
                            <th class="border border-slate-300">Budget</th>
                            <th class="border border-slate-300">Message</th>
                            <th class="border border-slate-300">Create WordPress Account</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customer_list as $user)

                            <tr>

                            <td class="border border-slate-300">{{ $user->name }}</td>
                            <td class="border border-slate-300"> {{$user->phone}}</td>
                            <td class="border border-slate-300">  {{$user->email}}</td>
                            <td class="border border-slate-300">  {{$user->budget}}</td>
                            <td class="border border-slate-300">  {{$user->message}}</td>
                            <td class="border border-slate-300">
                               <form action="" method="get">
                                 <button id="{{$user->id}}" onclick="addUserData({{$user->id}})" class="bg-blue-500 hover:bg-blue-700 text-gray-500 font-bold py-2 px-4 border border-blue-700 rounded">
                                    Create WordPress Account
                                </button>

                                 </form>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>




                    {{ $customer_list->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
     function addUserData(userid) {
         alert(userid)
         $.ajax({
             url: '{{'wordpress_users'}}',
             dataType: 'text',
             type: 'get',
             contentType: 'application/x-www-form-urlencoded',
             data: {userid: userid},
             success: function( data, textStatus, jQxhr )
             {
                 console.log(data)
                 alert(data);
              //   document.getElementById('details_info').innerHTML=data;
             },
             error: function( jqXhr, textStatus, errorThrown )
             {
                 //console.log( errorThrown );
                 alert(errorThrown);
             }
         }); // End of $.ajax({
        //  ajaxRequest.open("GET", "www.localhost/custom-wordpress/wp-content/themes/twentytwentytwo/templates/user_save.php" + queryString, true);

}
</script>
