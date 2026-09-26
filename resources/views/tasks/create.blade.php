<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>

<body>

    <h1>Add New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label>Task Name:</label><br>
        <input type="text" name="task_name" required>
        <br><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea>
        <br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
        <br><br>

        <label>Due Date:</label><br>
        <input type="date" name="due_date">
        <br><br>

        <button type="submit">Add Task</button>

        <a href="{{ route('tasks.index') }}">Back</a>

    </form>

</body>
</html>
