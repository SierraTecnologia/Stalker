<table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Customer</td>
                <td>Credit Card</td>
                <td>Price</td>
                <td>Gateway</td>
                <td>Money</td>
                <?php
                $user = \Auth::user();
                if($user && $user->role_id == \App\Models\Role::$GOOD) {
                    echo '<td>Client</td>';
                }
                ?>
                <td colspan="1">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($runners as $runner)
            <tr>
                <td>{{$runner->id}}</td>
                <td><a href="{{ route('customers.show', $runner->customer->id)}}">{{$runner->customer->name}}</a></td>
                <td><a href="{{ route('creditCards.show', $runner->creditCard->id)}}">{{$runner->creditCard->card_number}}</a></td>
                <td>{{$runner->total}}</td>
                <td>{{is_object($runner->gateway)?$runner->gateway->name:'Sem Gateway'}}</td>
                <td>{{is_object($runner->gateway)?$runner->money->name:'Nenhum associado'}}</td>
                <?php
                $user = \Auth::user();
                if($user && $user->role_id == \App\Models\Role::$GOOD) {
                    echo '<td><a href="'.route('users.show', $runner->user->id).'">'.$runner->user->name.'</td>';
                }
                ?>
                <td>
                    <a href="{{ route('runners.show',$runner->id)}}" class="btn btn-primary">Mais Informações</a>
                    <!--<a href="{{ route('runners.edit',$runner->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('runners.destroy', $runner->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>-->
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>