<!--   Core JS Files   -->
<script src="/admin/assets/js/core/popper.min.js"></script>
<script src="/admin/assets/js/core/bootstrap.min.js"></script>
<script src="/admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/admin/assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        hideMessage();
    });

    // Знаходимо всі input з класом "fileInput"
    var fileInputs = document.querySelectorAll('.fileInput');

    // Додаємо слухач події для кожного input
    fileInputs.forEach(function(input) {
        input.addEventListener('change', function(event) {
            var form = event.target.closest('.uploadForm');
            form.submit();
        });
    });
    $(".js-example-basic-multiple").select2();

    function hideMessage() {
        setTimeout(function() {
            $('#alert-message').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 2000);
    }

    function remove(questionId)
    {
        Swal.fire({
            title: 'Ти певнений?',
            text: "Відновити не вийде!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Так, видалити!',
            cancelButtonText: 'Відмінити'
        }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // );
                window.location.replace('/admin/recipe-builder/' + questionId + '/delete');
            }
        });
    }

    // Показати спінер при завантаженні сторінки
    document.addEventListener('DOMContentLoaded', function() {
        // Показуємо елемент спінера
        // document.getElementById('spinner-container').style.display = 'block';

        // Після 2 секунд приховуємо спінер
        setTimeout(function() {
            document.getElementById('spinner-container').style.display = 'none';
        }, 500);
    });

    // Функція, яка викликається при завантаженні сторінки
    window.onload = function() {
        // Тут можна виконати певні дії після завантаження сторінки, якщо потрібно
        // Наприклад, викликати функції або отримати дані з сервера.
    };
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/admin/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
<x-notify::notify />
@notifyJs
</body>

</html>
