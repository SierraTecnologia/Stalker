<table class="table table-striped">
    <thead>
        <tr>
            <td>Id</td>
            <td>Modelo</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($models as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->getApresentationName()}}</td>
            <td>
                @foreach ($actionsForModels as $actionsForModel)
                    <a href="{{ route('finder.action.actions.execute', [$model->id, $actionsForModel->cod])}}" class="btn btn-primary">{{$actionsForModel->cod}}</a>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>