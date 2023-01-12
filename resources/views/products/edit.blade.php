<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREATE</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form action="/update/{{$product -> id}}" method="POST">
        @csrf
        <input type="text" name="name" value="{{$product -> name}}" placeholder="Digite o nome...">
        <input type="text" name="description" value="{{$product -> description}}" placeholder="Digite a descrição...">
        <input type="number" step="any" name="price" value="{{$product -> price}}" placeholder="Digite o preço...">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
