<x-app-layout>
    <div class="card">
        <div class="card-header">
            Export
        </div>
        <div class="card-body">
            <form action="{{route('export')}}" method="post" >
                <div class="hstack gap-2">
                    <div>Choose Date Range</div>
                    <div><input type="date" name="from" value="" required></div>
                    <div><input type="date" name="to" value="" required></div>
                </div>
                <hr>
                <div>Choose columns to export</div>
                @foreach($cols as $b)
                    @foreach($b as $key => $col)
                        <div>
                            <input type="checkbox" name="{{$key}}" value="1" id="{{$key}}" class="form-check-inline" @checked(true)>
                            <label for="{{$key}}">{{$col}}</label>
                        </div>
                    @endforeach
                @endforeach
                @csrf
                <button class="btn btn-success">Export</button>
            </form>
        </div>
    </div>

</x-app-layout>
