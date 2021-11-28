document.addEventListener("DOMContentLoaded", function ()
{
    let scrollBtn = document.querySelector(".more_cards");

    scrollBtn.onclick = function () {
        let id = 0
        let cards = document.getElementsByClassName("card");

        if (cards) {
            cards = cards[cards.length - 1];
        }
        if (cards) {
            id = cards.getAttribute('id');
        }

        let url = "/index.php?id=" + id;

        let request = new XMLHttpRequest();
        request.open("GET", url);

        request.onreadystatechange = function () {
            if(this.readyState === 4 && this.status === 200) {
                if (this.responseText.length !== 0) {
                    document.getElementsByClassName("content")[0].innerHTML += this.responseText;
                }
        }

        request.send();
    }
}
