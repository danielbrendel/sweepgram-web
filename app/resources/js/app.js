/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

import './../sass/app.scss';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.vue = new Vue({
    el: '#app',

    data: {
    },

    methods: {
        ajaxRequest: function (method, url, data = {}, successfunc = function(data){}, finalfunc = function(){}, config = {})
        {
            let func = window.axios.get;
            if (method == 'post') {
                func = window.axios.post;
            } else if (method == 'patch') {
                func = window.axios.patch;
            } else if (method == 'delete') {
                func = window.axios.delete;
            }

            func(url, data, config)
                .then(function(response){
                    successfunc(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function(){
                        finalfunc();
                    }
                );
        },

        submitArchive: function(target, label, file) {
            let origLabel = document.getElementById(label).innerHTML;
            document.getElementById(label).innerHTML = '<i class="fas fa-spinner fa-spin fa-lg"></i>';

            target.innerHTML = '';
            document.querySelector('.page-info-error').innerHTML = '';
            document.querySelector('.page-info-error').classList.add('is-hidden');

            let formData = new FormData();
            formData.append('archive', file.files[0]);

            window.vue.ajaxRequest('post', location.origin + '/query', formData, function(response){
                if (response.code == 200) {
                    response.data.forEach(function(item, index){
                        target.innerHTML += window.vue.renderItem(item);
                    });
                } else {
                    let elerr = document.querySelector('.page-info-error');

                    elerr.innerHTML = response.msg;

                    if (elerr.classList.contains('is-hidden')) {
                        elerr.classList.remove('is-hidden');
                    }
                }
            }, function(){
                document.getElementById(label).innerHTML = origLabel;
            }, {
            });
        },

        renderItem: function(item) {
            let td = new Date(item.timestamp * 1000);

            let html = `
                <div class="page-data-item">
                    <div class="page-data-item-username">` + item.value + `</div>
                    <div class="page-data-item-timestamp">` + td.toLocaleDateString('en-US') + `</div>
                    <div class="page-data-item-link"><a href="` + item.href + `" target="_blank"><i class="fab fa-instagram"></i></a></div>
                
                </div>
            `;

            return html;
        },
    }
});