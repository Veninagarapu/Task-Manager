<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="public/css/styles.css" rel="stylesheet">
    <script defer src="public/js/main.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body x-data="taskManager" x-init="init() class="bg-gray-100 p-5">

    <div x-data="{showForm : false}" class="container mx-auto max-w-xl" x-data="taskManager">
        <h1 class="text-2xl font-bold mb-4 text-center">Task Manager</h1>

        <!-- Task List -->
               <!-- Task List -->
    <div id="task-list" class="bg-white p-4 rounded shadow-lg">

    <template x-for="task in tasks" :key="task.id">
        <div class="bg-gray-100 p-4 mb-2 rounded-lg shadow-sm">
            <h2 class="font-bold text-lg" x-text="task.title"></h2>
            <p class="text-sm text-gray-600" x-text="task.description"></p>
            <span class="text-xs text-white px-2 py-1 rounded" 
      x-bind:class="task.priority === 'High' ? 'bg-red-500' : (task.priority === 'Medium' ? 'bg-yellow-500' : 'bg-green-500')">
    <span x-text="task.priority"></span>
    </span>

            <p class="text-xs text-gray-400 mt-2" x-text="task.created_at"></p>
        </div>
    </template>
</div>

    </div>
            <?php foreach ($tasks as $task): ?>
                <div class="bg-gray-100 p-4 mb-2 rounded-lg shadow-sm">
                    <h2 class="font-bold text-lg"><?= $task['title']; ?></h2>
                    <p class="text-sm text-gray-600"><?= $task['description']; ?></p>
                    <span class="text-xs text-white bg-<?= $task['priority'] == 'High' ? 'red-500' : ($task['priority'] == 'Medium' ? 'yellow-500' : 'green-500'); ?> px-2 py-1 rounded">
                        <?= $task['priority']; ?>
                    </span>
                    <p class="text-xs text-gray-400 mt-2"><?= date('Y-m-d', strtotime($task['created_at'])); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Task Form Button -->
        <div class="text-center mt-5">
            <button @click="showForm = !showForm" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Task</button>
        </div>

        <!-- Task Form Modal -->
        <div x-show="showForm" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <?php include 'views/task_form.php'; ?>
            </div>
        </div>
    </div>

</body>
</html>
