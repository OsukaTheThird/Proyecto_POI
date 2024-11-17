<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tareas</title>
    <link rel="stylesheet" href="../views/css/tareasStyle.css">
</head>
<body>
    <div class="list roundBorder">
        <div class="todo">
            <div class="title">
                <h1>Tarea</h1>
            </div>
            <div id="dateText"></div>
        </div>
        <form onsubmit="addNewTask(event)" >
            <input type="text" name="taskText" autocomplete="off" placeholder="Nueva tarea" class="roundBorder">
            <button type="submit" class="addTaskButton">+</button>
            <button type="button" class="orderButton roundBorder" onclick="renderOrderedTasks()">Ordenar</button>
        </form>
        <div id="tasksContainer"></div>
    </div>

    <script src="script.js" type="text/javascript" defer></script>
</body>
</html>