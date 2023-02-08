<x-guest-layout>


    <p>Dear {{$firstName}},</p>



    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


    <div class="container">
        @foreach($displayRows as $key => $title)
        <div class="row">
            <div class="col-8">{{$title}}</div>
            <div class="col">{{$$key}}</div>
        </div>
        @endforeach
    </div>

</x-guest-layout>
