<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <!-- Links CSS -->
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
    rel="stylesheet"
    />

    <!-- JavaScript -->
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
    ></script>
    
</head>
<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-Do List</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="description" class="form-control" placeholder="Adicione seu afazer">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>

                <!-- Count Show -->
                @if (count($toDoLists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($toDoLists as $toDoList)
                    
                    
                    <li class="list-group-item">
                            <!-- Delete Item -->
                            <form action="{{ route('destroy', $toDoList->id) }}" method="POST">
                                {{ $toDoList->description }}
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
                            </form>

                            <!-- Check Item -->
                            <form action="{{ route('updateStatus', $toDoList->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $toDoList->id }}">
                                @if ($toDoList->status)
                                    <input name="status" onchange="this.form.submit()" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" checked disabled>
                                @else
                                    <input name="status" onchange="this.form.submit()" class="form-check-input" type="checkbox" value="0" id="flexCheckDefault">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Concluído
                                </label>
                            </form>
                    </li>
                    @endforeach
                </ul>
                <!-- Caso não tenha tarefas -->
                @else
                    <p class="text-center mt-3">Sem afazeres</p>
                @endif
                </div>
                <!-- Quantidade de tarefas -->
                @if (count($toDoLists))
                    <div class="card-footer">
                        Você possui {{ count($toDoLists) }} tarefa(s).
                    </div>
                @endif
            </div>       
        </div>
</body>
</html>