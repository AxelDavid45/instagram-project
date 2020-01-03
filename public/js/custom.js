
document.addEventListener('click', (e) => {
    //Base url
    let URL = 'http://proyecto-instagram.com.devel/';

    if (e.target.id == 'heart') {
        //Like counter container
        let likeCounter = document.querySelector('.like-counter');
        let numberLikes = parseInt(likeCounter.textContent);

        console.log(likeCounter.textContent);
        // Image id
        let imageId = e.target.getAttribute('data-id');

        if (e.target.classList.contains('like')) {
            //Remove class like
            e.target.classList.remove('like');
            //Add 1 to like counter
            numberLikes--;
            //Insert into html
            likeCounter.innerHTML = numberLikes.toString();
            console.log(likeCounter.textContent);
            //Delete like
            URL += 'likes/dislike/';
            likes(URL, imageId);
        } else {
            e.target.classList.add('like');
            numberLikes++;
            likeCounter.innerHTML = numberLikes.toString();
            console.log(likeCounter.textContent);
            //Add like
            URL += 'likes/like/';
            likes(URL, imageId);
        }

    }

});

function likes(URL, id) {
    const request = new XMLHttpRequest();
    URL += id;
    request.open('GET', URL, true);
    request.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(request.responseText);
            console.log(response);
        }
    };
    request.send();

}
