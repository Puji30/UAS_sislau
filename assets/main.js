
var keyword = document.getElementById('search_transaksi');
var result = document.getElementById('result');
keyword.addEventListener('keyup', function () {
    // deklarasi objext
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            result.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'index.php?mod=transaksi&page=ajax&cari=' + keyword.value, true);
    xhr.send();
});
