<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title); ?></title>
    <style>
       .lato-regular {
  font-family: "Lato", sans-serif;
  font-weight: 400;
  font-style: normal;
}

    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="<?php echo e(url('public/webfont')); ?>/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        body{
            font-family: 'Lato';
            background-color: #e9ebec
        }
    </style>
  </head>
  <body>
    <div class="container mt-4">
        <?php echo $__env->yieldContent('container'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<script>
       function lihatGambar() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#addImage');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
</script>
<script>
    var subtotal_price = 0;
    var total_price = 0;

    function addToCart(id, name, price) {
        const element = document.getElementById("list-menu");
        const element_total = document.getElementById("total");
        const element_subtotal = document.getElementById("subtotal");
        const element_charge = document.getElementById("charge");
        const element_pay_charge = document.getElementById("pay_charge");

        const found = sessionStorage.getItem(`${id}`);

        if (found == null) {
            sessionStorage.setItem(`${id}`, '1');
            element.innerHTML += ` <tr>
                        <td width="50%" align="left">${name}</td>
                        <td width="20%" align="right"id="${id}"></td>
                        <td width="30%" align="right" id="price-${id}">Rp ${formatRupiah(String(price))}</td>
                    </tr>`;
            subtotal_price += price;
            total_price += price;
            element_subtotal.innerHTML = formatRupiah(String(subtotal_price));
            element_total.innerHTML = formatRupiah(String(total_price));
            element_charge.innerHTML = formatRupiah(String(total_price));
            element_pay_charge.innerHTML = formatRupiah(String(total_price));
        } else {
            const qty = document.getElementById(`${id}`);
            const element_price = document.getElementById(`price-${id}`);
            const found = sessionStorage.getItem(`${id}`);
            var new_qty = parseInt(found) + 1;
            var new_price = new_qty * price;
            sessionStorage.setItem(`${id}`, new_qty);
            qty.innerHTML = `x${new_qty}`;
            element_price.innerHTML = `Rp ${formatRupiah(String(new_price))}`;
            subtotal_price += price;
            total_price += price;
            element_subtotal.innerHTML = formatRupiah(String(subtotal_price));
            element_total.innerHTML = formatRupiah(String(total_price));;
            element_charge.innerHTML = formatRupiah(String(total_price));;
            element_pay_charge.innerHTML = formatRupiah(String(total_price));;
        }
        // console.log(found);
    }

    window.onload = function() {
        sessionStorage.clear();
    }

    var btnPrint = document.getElementById("print");
    btnPrint.onclick = function() {
        var prtContent = document.getElementById("bill");
        window.print()
    }

    let rupiah = document.getElementById('pay');
    let kembali = document.getElementById('kembali');
    rupiah.addEventListener('keyup', function(e) {
        // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value);
        let formatKembali = kembalian(rupiah.value, total_price);
        if (formatKembali > 0) {
            formatKembali = formatRupiah(String(formatKembali));
            kembali.innerHTML = formatKembali;
        } else {
            kembali.innerHTML = '0';
        }
    });

    function kembalian(angka, total) {
        let harga = angka.split(".");
        let bayar = '';
        for (let indeks = 0; indeks < harga.length; indeks++) {
            bayar += harga[indeks];
            // console.log(harga[indeks]);
        }
        totalKembali = bayar - total;
        return totalKembali;
    }

    /* Fungsi formatRupiah */
    function formatRupiah(angka) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }
</script>
</html>
<?php /**PATH C:\Users\wiran\Documents\SEMESTER 4\assesment\resources\views/layouts/main.blade.php ENDPATH**/ ?>