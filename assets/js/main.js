// # Author : alireza10up
// # Team : 10up
// # Date :  2022oct25
document.addEventListener("DOMContentLoaded", function () {
    let btns = document.querySelectorAll('.copy-btns');
    btns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            let clipboard = new ClipboardJS('.copy-btns');

            clipboard.on('success', function (e) {
                alert('با موفقیت کپی شد');
            });

            clipboard.on('error', function (e) {
                console.log(e);
            });
        });
    });
});

function clearAlert() {
    setTimeout(() => { document.getElementById('#alert').style.display = 'none'; }, 5000);
}
