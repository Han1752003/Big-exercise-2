<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2>Task List</h2>
    <form action="/tasks/add" method="POST">
        <h3>Add Task</h3>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="content">Content:</label>
        <textarea name="content" id="content" required></textarea>
        
        <label for="priority">Priority:</label>
        <select name="priority" id="priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
        
        <button type="submit">Add Task</button>
    </form>
    
    <h3>Your Tasks</h3>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <form action="/tasks/update" method="POST">
                    <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                    <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>">
                    <textarea name="content"><?= htmlspecialchars($task['content']) ?></textarea>
                    <select name="priority">
                        <option value="low" <?= $task['priority'] == 'low' ? 'selected' : '' ?>>Low</option>
                        <option value="medium" <?= $task['priority'] == 'medium' ? 'selected' : '' ?>>Medium</option>
                        <option value="high" <?= $task['priority'] == 'high' ? 'selected' : '' ?>>High</option>
                    </select>
                    <input type="checkbox" name="completed" value="1" <?= $task['completed'] ? 'checked' : '' ?>> Completed
                    <button type="submit">Update</button>
                    <a href="/tasks/delete?task_id=<?= $task['id'] ?>">Delete</a>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/auth/logout">Logout</a>
</body>
</html>
