document.addEventListener('DOMContentLoaded', function () {
    const checkAll = document.getElementById('checkAll');
    const uncheckAll = document.getElementById('uncheckAll');
    const checkboxes = document.querySelectorAll('.permission-checkbox');

    checkAll.addEventListener('change', function () {
        if (checkAll.checked) {
            checkboxes.forEach(checkbox => checkbox.checked = true);
            uncheckAll.checked = false; // Uncheck "Tous décocher"
        }
    });

    uncheckAll.addEventListener('change', function () {
        if (uncheckAll.checked) {
            checkboxes.forEach(checkbox => checkbox.checked = false);
            checkAll.checked = false; // Uncheck "Tous cocher"
        }
    });

    // Ensure only one of "Tous cocher" or "Tous décocher" can be checked at a time
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
                uncheckAll.checked = false;
            } else {
                checkAll.checked = false;
            }
        });
    });
});
