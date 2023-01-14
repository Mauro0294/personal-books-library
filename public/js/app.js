const checkboxes = document.getElementsByClassName('toggle-read');
const labels = document.getElementsByTagName('label');
window.addEventListener("load", function() {
    for (let i = 0; i < checkboxes.length; i++) {
        const checkbox = checkboxes[i];
        checkbox.addEventListener('change', function () {
            fetch('/api/books/toggle-read', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    id: checkbox.value,
                    isRead: checkbox.checked,
                })
                }).then(function (response) {
                    labels[i].innerText = checkbox.checked ? 'Finished' : 'On the shelf';
                }).catch(function (error) {
                    console.log(error);
                });
            });
        }
    });