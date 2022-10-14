'use strict';

import like from "./like";
import dislike from "./dislike";

const likeButton = document.querySelector('.like'),
      likeCountSpan = document.querySelector('.likes-count'),
      postId = document.querySelector('#post_id');

export default function liker() {
    likeButton.addEventListener('click', (e) => {
        e.preventDefault();

        if (likeButton.classList.contains('liked')) {
            likeButton.classList.remove('liked');

            dislike(postId.value, likeCountSpan);
        }

        if (!likeButton.classList.contains('liked')) {
            likeButton.classList.add('liked');

            like(postId.value, likeCountSpan);
        }
    });
}
