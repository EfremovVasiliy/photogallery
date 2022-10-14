'use strict';

import jQuery from "jquery";

export default function dislike(postId, likeCountSpan) {
    jQuery(document).ready(function($) {
        $.ajax({
            url: '/dislike',
            type: 'DELETE',
            data: JSON.stringify({postId}),
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                'accept': 'application/json',
            },
            success: function(data) {
                likeCountSpan.textContent = data;
            },
            error: function(msg) {
                console.log(msg);
            }
        });
    });
}
