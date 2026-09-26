<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>

<body>

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Task Name:</label><br>
        <input type="text" name="task_name"
               value="{{ $task->task_name }}" required>
        <br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ $task->description }}</textarea>
        <br><br>

        <label>Status:</label><br>

        <select name="status">

            <option value="Pending"
                {{ $task->status == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ $task->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <br><br>

        <label>Due Date:</label><br>
        <input type="date" name="due_date"
               value="{{ $task->due_date }}">
        <br><br>

        <button type="submit">Update Task</button>

        <a href="{{ route('tasks.index') }}">Back</a>

    </form>

</body>
</html>
