

let currentPage = <?= $page ?>;  // Текущая страница
const itemsPerPage = 3;  // Количество объявлений на странице

// Функция для загрузки дополнительных данных
function loadMore() {
    if (currentPage < totalPages) {
        currentPage++;  // Увеличиваем номер страницы

        const preference = document.getElementById('preference').value;
        const likes = document.getElementById('likes').value;

        // Строим URL для AJAX-запроса с параметрами
        const url = `model_annons.php?page=${currentPage}&preference=${preference}&likes=${likes}&sort_by=${document.getElementById('sort_by').value}`;

        // Отправляем AJAX-запрос
        fetch(url)
            .then(response => response.text())
            .then(data => {
                // Добавляем новые данные в контейнер
                document.getElementById('announcements-container').innerHTML += data;
            })
            .catch(error => console.error('Ошибка при загрузке данных:', error));
    } else {
        alert('Больше нет объявлений!');
    }
}