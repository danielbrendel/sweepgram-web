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

            let formData = new FormData();
            formData.append('archive', file.files[0]);

            window.vue.ajaxRequest('post', location.origin + '/query', formData, function(response){
                if (response.code == 200) {
                    response.data.forEach(function(item, index){
                        target.innerHTML += window.vue.renderItem(item);
                    });
                } else {
                    document.querySelector('.page-info-error').innerHTML = response.msg;
                }
            }, function(){
                document.getElementById(label).innerHTML = origLabel;
            }, {
            });
        },

        renderItem: function(item) {
            let html = `
                <a href="`+ item.href + `" target="_blank"><div class="page-data-item">` + item.value + `</div></a>
            `;

            return html;
        },
    }
});