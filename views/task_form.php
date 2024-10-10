<form id="task-form" class="space-y-4" @submit.prevent="submitTask()">
    <div>
        <label class="block">Title:</label>
        <input type="text" id="task-title" class="border p-2 w-full">
    </div>

    <div>
        <label class="block">Description:</label>
        <textarea id="task-desc" class="border p-2 w-full"></textarea>
    </div>

    <div>
        <label class="block">Priority:</label>
        <select id="task-priority" class="border p-2 w-full">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>

    <div class="flex justify-between">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Task</button>
        <button type="button" @click="showForm = false" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
    </div>
</form>
