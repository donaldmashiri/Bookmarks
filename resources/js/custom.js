// let axios = require('axios');
const axios = require('axios').default;
import jQuery from 'jquery';
window.$ = jQuery;

$('body').on('click', '.delete-bookmark', function(){
    let id = $(this).data('id');

    axios.delete('/bookmarks/'+id)
        .then(function(){
            window.location.reload();
        })
        .catch(function(error){
            console.log(error);
        });

});

