document.addEventListener("DOMContentLoaded", function () {
    console.log('test')
    let acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
        if (i === 0) {
            acc[i].parentNode.classList.toggle("active");
        }

        acc[i].addEventListener("click", function () {
            this.parentNode.classList.toggle("active");
        });
    }
});
