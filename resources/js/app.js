import "./bootstrap";

let title = "Sudin Nakertransgi | Absensi Karyawan";
let speed = 200; // kecepatan scroll dalam milidetik
let index = 0;

function scrollTitle() {
    document.title = title.slice(index) + " " + title.slice(0, index);
    index = (index + 1) % title.length;
    setTimeout(scrollTitle, speed);
}

scrollTitle();
