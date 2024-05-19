// script.js
const taskInput = document.getElementById('taskInput');
const taskList = document.getElementById('taskList');

function addTask() {
    const taskText = taskInput.value.trim();
    if (taskText) {
        const li = document.createElement('li');
        li.textContent = taskText;
        li.addEventListener('click', toggleTask);
        taskList.appendChild(li);
        taskInput.value = '';
    }
}

function toggleTask(event) {
    const li = event.target;
    li.classList.toggle('completed');
}
