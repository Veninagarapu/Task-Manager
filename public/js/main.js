document.addEventListener("alpine:init", () => {
    Alpine.data('taskManager', () => ({
        tasks: [],
        showForm: false, // Variable to control form visibility

        // Method to fetch existing tasks
        fetchTasks() {
            fetch('./src/tasks.php') // Fetch the current tasks
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    this.tasks = data; // Update tasks array
                })
                .catch(error => console.error('Error fetching tasks:', error));
        },

        // Method to submit a new task
        submitTask() {
            const title = document.getElementById('task-title').value;
            const description = document.getElementById('task-desc').value;
            const priority = document.getElementById('task-priority').value;

            const newTask = {
                title,
                description,
                priority,
            };

            console.log("new task", newTask);

            // Send task to backend
            fetch('./src/add_task.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(newTask),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Expecting the new task as a response
            })
            .then(data => {
                this.tasks.push(data); // Add the new task to the tasks array
                console.log("Tasks after adding new task:", this.tasks); // Log for debugging
                this.showForm = false; // Close the form
            })
            .catch(error => console.error('Error adding task:', error));

            // Optionally, you could fetch tasks again
            // this.fetchTasks(); // You could uncomment this if needed
        },

        // Initialize the component and fetch tasks
        init() {
            this.fetchTasks(); // Fetch tasks when the component initializes
        }
    }));
});

