<table class="table table-striped">
    <thead>
        <tr>
            <td>Model</td>
            <td>Values</td>
        </tr>
    </thead>
    <tbody>
        @foreach($modelForActions as $modelForAction)
        <tr>
            <td>{{$modelForAction::$apresentationName}}</td>
            <td>{{$modelForAction::count()}}</td>
            <td>
                <a href="{{ route('finder.action.actions.model', str_replace('\\', '_', $modelForAction))}}" class="btn btn-primary">Models</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>